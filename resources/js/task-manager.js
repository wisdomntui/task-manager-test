import "jquery-ui-dist/jquery-ui.css";
import "bootstrap/dist/css/bootstrap.min.css";
import "bootstrap";
import "jquery-ui-dist/jquery-ui";

$(document).ready(function () {
    // Filter Tasks by Project
    $("#projectSelect").on("change", function () {
        const projectId = $(this).val();

        if (projectId.length > 0) {
            location.href = `?project=${projectId}`;
        } else {
            location.href = `/`;
        }
    });

    // Add Task
    $("#addTaskForm").on("submit", function (e) {
        e.preventDefault();
        const taskName = $("#taskName").val();
        const projectId = $("#taskProject").val();

        $("#task-btn").addClass("disabled");
        $("#task-btn").text("Processing...");

        $.post("/tasks", {
            _token: $('meta[name="csrf-token"]').attr("content"),
            name: taskName,
            project_id: projectId,
        })
            .done(function () {
                $("#task-btn").text("Add Task");
                $("#task-btn").removeClass("disabled");
                location.reload();
            })
            .fail((data, status) => {
                if (data.status == 422) {
                    alert("All fields are required.");
                } else {
                    alert("Error creating task, try again.");
                }

                $("#task-btn").removeClass("disabled");
                $("#task-btn").text("Add Task");
            });
    });

    // Edit Task
    $(".editTaskBtn").on("click", function () {
        const taskId = $(this).data("id");
        const taskName = $(this).data("name");
        const projectId = $(this).data("project");

        $("#editTaskId").val(taskId);
        $("#editTaskName").val(taskName);
        $("#editTaskProject").val(projectId);
        $("#editTaskModal").modal("show");
    });

    $("#editTaskForm").on("submit", function (e) {
        e.preventDefault();
        const taskId = $("#editTaskId").val();
        const taskName = $("#editTaskName").val();
        const projectId = $("#editTaskProject").val();

        $.ajax({
            url: `/tasks/${taskId}`,
            method: "PUT",
            data: {
                _token: $('meta[name="csrf-token"]').attr("content"),
                name: taskName,
                project_id: projectId,
            },
            success: function () {
                location.reload();
            },
        });
    });

    // Delete Task
    $(".deleteTaskBtn").on("click", function () {
        const taskId = $(this).data("id");
        if (confirm("Are you sure you want to delete this task?")) {
            $.ajax({
                url: `/tasks/${taskId}`,
                method: "DELETE",
                data: {
                    _token: $('meta[name="csrf-token"]').attr("content"),
                },
                success: function () {
                    location.reload();
                },
            });
        }
    });

    // Drag and Drop Reordering
    $("#taskList").sortable({
        update: function () {
            const order = [];
            $("#taskList li").each(function (index) {
                order.push({
                    id: $(this).data("id"),
                    priority: index + 1,
                });
            });
            $.post("/tasks/reorder", {
                _token: $('meta[name="csrf-token"]').attr("content"),
                order: order,
            }).done(() => {
                location.reload();
            });
        },
    });
});
