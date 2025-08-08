const addBtn = document.getElementById("add-task");
const input = document.getElementById("new-task");
const list = document.getElementById("task-list");
const themeToggle = document.getElementById("theme-toggle");

addBtn.addEventListener("click", () => {
  const text = input.value.trim();
  if (text !== "") {
    createTask(text);
    input.value = "";
  }
});

function createTask(text) {
  const li = document.createElement("li");
  li.className = "task-item";

  const span = document.createElement("span");
  span.className = "task-text";
  span.textContent = text;

  const actions = document.createElement("div");
  actions.className = "task-actions";

  const editBtn = document.createElement("button");
  editBtn.textContent = "✏️";
  editBtn.onclick = () => {
    const newText = prompt("Edit task:", span.textContent);
    if (newText !== null && newText.trim() !== "") {
      span.textContent = newText.trim();
    }
  };

  const completeBtn = document.createElement("button");
  completeBtn.textContent = "✅";
  completeBtn.onclick = () => {
    span.classList.toggle("completed");
  };

  const deleteBtn = document.createElement("button");
  deleteBtn.textContent = "🗑️";
  deleteBtn.onclick = () => {
    li.remove();
  };

  actions.append(editBtn, completeBtn, deleteBtn);
  li.append(span, actions);
  list.appendChild(li);
}

themeToggle.addEventListener("click", () => {
  document.body.classList.toggle("dark-mode");
  themeToggle.textContent =
    document.body.classList.contains("dark-mode") ? "☀️" : "🌙";
});