import { CSRF_TOKEN } from "../utils/csrf";

export const getTodosList = async () =>
  fetch("./todos/get", {
    method: "post",
    headers: {
      "content-type": "application/json",
      "X-CSRF-TOKEN": CSRF_TOKEN,
    },
    body: null,
  }).then(async (res) => {
    return res.json();
  });

export const addTodo = async (task) =>
  fetch("./todos/add", {
    method: "post",
    headers: {
      "content-type": "application/json",
      "X-CSRF-TOKEN": CSRF_TOKEN,
    },
    body: JSON.stringify({
      task: task
    })
  }).then(async (res) => {
    return res.json();
  });

export const updateTodo = async (todo) =>
  fetch(`./todos/update/${todo.id}`, {
    method: "post",
    headers: {
      "content-type": "application/json",
      "X-CSRF-TOKEN": CSRF_TOKEN,
    },
    body: JSON.stringify({
      task: todo.task,
      isDone: todo.isDone
    }),
  }).then(async (res) => {
    return res.json();
  });

export const deleteTodo = async (id) =>
  fetch(`./todos/delete/${id}`, {
    method: "post",
    headers: {
      "content-type": "application/json",
      "X-CSRF-TOKEN": CSRF_TOKEN,
    },
    body: null,
  }).then(async (res) => {
    return res.json();
  });

export const getOrder = async () =>
  fetch("./orders/get", {
    method: "post",
    headers: {
      "content-type": "application/json",
      "X-CSRF-TOKEN": CSRF_TOKEN,
    },
    body: null,
  }).then(async (res) => {
    return res.json();
  });

export const setOrder = async (order) =>
  fetch("./orders/set", {
    method: "post",
    headers: {
      "content-type": "application/json",
      "X-CSRF-TOKEN": CSRF_TOKEN,
    },
    body: JSON.stringify({
      todo_order: order
    }),
  }).then(async (res) => {
    return res.json();
  });
