const chatbotBtn = document.querySelector(".chatbot-btn");
const chatbotCloseBtn = document.querySelector(".close-btn");
const chatArea = document.querySelector(".chatbox");
const chatInput = document.querySelector(".chat-input textarea");
const sendBtn = document.querySelector(".chat-input span");

let conversation = []; // keep chat history
const API_KEY = "AIzaSyAZD6xEYh6ZuaxhvDSobExKE98KVrQ3wGg"; // ⚠️ never expose in frontend (use backend in production)
const inputHeight = chatInput.scrollHeight;

const chatList = (message, className) => {
  const chatLi = document.createElement("li");
  chatLi.classList.add("chat", className);
  let chatContent =
    className === "outgoing"
      ? "<p></p>"
      : '<span class="icon"><i class="fa-regular fa-envelope"></i></span><p></p>';
  chatLi.innerHTML = chatContent;
  chatLi.querySelector("p").textContent = message;
  return chatLi;
};
//Auto open chatbot and show greeting after 20 seconds
window.addEventListener("load", () => {
  setTimeout(() => {
    document.body.classList.add("show-chatbot"); // open chatbot

    const greetingLi = chatList("As-salamu alaykum,How can I help you, Sir?", "incoming");
    chatArea.appendChild(greetingLi);
    conversation.push({ role: "model", content: "As-salamu alaykum,How can I help you, Sir?" });
    chatArea.scrollTo(0, chatArea.scrollHeight);
  }, 10000); // 10000 ms = 10seconds
});



const generateResponse = (chatElement) => {
  const API_URL =
  "https://generativelanguage.googleapis.com/v1beta/models/gemini-2.5-flash:generateContent?key=" +
  API_KEY;



  const messageElement = chatElement.querySelector("p");

  // convert conversation to Gemini format
  const contents = conversation.map((msg) => ({
    role: msg.role,
    parts: [{ text: msg.content }],
  }));

  const requestOptions = {
    method: "POST",
    headers: {
      "Content-Type": "application/json",
    },
    body: JSON.stringify({ contents }),
  };

  fetch(API_URL, requestOptions)
    .then((res) => res.json())
    .then((data) => {
      if (data.error) throw new Error(data.error.message);

      const reply =
        data.candidates?.[0]?.content?.parts?.[0]?.text?.trim() ||
        "⚠️ No response from Gemini";

      messageElement.textContent = reply;

      // save assistant reply
      conversation.push({ role: "model", content: reply });
    })
    .catch((err) => {
      messageElement.classList.add("error");
      messageElement.textContent = "⚠️ Error: " + err.message;
    })
    .finally(() => chatArea.scrollTo(0, chatArea.scrollHeight));
};

const handleChat = () => {
  const userMessage = chatInput.value.trim();
  if (!userMessage) return;

  chatInput.value = "";
  chatInput.style.height = `${inputHeight}px`;

  // show user message
  chatArea.appendChild(chatList(userMessage, "outgoing"));
  chatArea.scrollTo(0, chatArea.scrollHeight);

  // save user message in history
  conversation.push({ role: "user", content: userMessage });

  // show loading dots
  setTimeout(() => {
    const incomingChatLi = chatList("...", "incoming");
    chatArea.appendChild(incomingChatLi);
    chatArea.scrollTo(0, chatArea.scrollHeight);
    generateResponse(incomingChatLi);
  }, 100);
};

// auto resize textarea
chatInput.addEventListener("input", () => {
  chatInput.style.height = `${inputHeight}px`;
  chatInput.style.height = `${chatInput.scrollHeight}px`;
});

// send button click
sendBtn.addEventListener("click", handleChat);

// toggle chatbot window
chatbotBtn.addEventListener("click", () =>
  document.body.classList.toggle("show-chatbot")
);

chatbotCloseBtn.addEventListener("click", () =>
  document.body.classList.remove("show-chatbot")
);

// press Enter to send
chatInput.addEventListener("keydown", (e) => {
  if (e.key === "Enter" && !e.shiftKey && window.innerWidth > 800) {
    e.preventDefault();
    handleChat();
  }
});
