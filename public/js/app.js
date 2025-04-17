document.addEventListener("DOMContentLoaded", () => {
    const taskForm = document.getElementById("task-form");
    const csrfToken = document
        .querySelector('meta[name="csrf-token"]')
        .getAttribute("content");

    taskForm.addEventListener("submit", async (e) => {
        e.preventDefault();

        const taskName = document.getElementById("task-name").value;

        const response = await fetch("/tasks", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": csrfToken,
            },
            body: JSON.stringify({ name: taskName }),
        });

        if (response.ok) {
            const task = await response.json();
            addTaskToTable(task);
            taskForm.reset();
        } else {
            console.error("Ошибка при добавлении задачи");
        }
    });

    async function fetchTasks() {
        const response = await fetch("/tasks");
        if (response.ok) {
            const tasks = await response.json();
            tasks.forEach((task) => addTaskToTable(task));
        } else {
            console.error("Ошибка при загрузке задач");
        }
    }

    function addTaskToTable(task) {
        const tasksBody = document.getElementById("tasks-body");

        const row = document.createElement("tr");
        row.setAttribute("id", `task-${task.id}`); // Устанавливаем id для строки
        row.classList.add("task-row", "fade-in"); // Добавляем классы для анимации

        row.innerHTML = `
            <td><input type="checkbox" ${
                task.completed ? "checked" : ""
            } onchange="toggleTask(${task.id}, this.checked)"></td>
            <td>${task.name}</td>
            <td><button onclick="deleteTask(${task.id})">Удалить</button></td>
        `;

        tasksBody.appendChild(row);
    }

    window.toggleTask = async (id, completed) => {
        await fetch(`/tasks/${id}`, {
            method: "PUT",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": csrfToken,
            },
            body: JSON.stringify({ completed }),
        });
    };

    window.deleteTask = async (id) => {
        const confirmation = confirm("Действительно удалить?");
        if (!confirmation) {
            return;
        }

        const response = await fetch(`/tasks/${id}`, {
            headers: {
                "X-CSRF-TOKEN": csrfToken,
            },
            method: "DELETE",
        });

        if (response.ok) {
            const row = document.getElementById(`task-${id}`);
            if (row) {
                row.remove();
            }
        } else {
            console.error("Ошибка при удалении задачи");
        }
    };

    fetchTasks();

    document
        .getElementById("search-input")
        .addEventListener("input", function () {
            const searchTerm = this.value.toLowerCase();

            const rows = document.querySelectorAll("#tasks-body tr");

            rows.forEach((row) => {
                const taskName = row.cells[1].textContent.toLowerCase();

                if (taskName.includes(searchTerm)) {
                    row.style.display = "";
                } else {
                    row.style.display = "none";
                }
            });
        });
});
