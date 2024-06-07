import {createStore} from 'vuex'
import {getTasks, createTask, updateTask, deleteTask} from '@/services/api'

export default createStore({
    state: {
        tasks: []
    },
    mutations: {
        setTasks(state, tasks) {
            state.tasks = tasks
        },
        addTask(state, task) {
            state.tasks.push(task)
        },
        updateTask(state, updatedTask) {
            const index = state.tasks.findIndex(task => task.id === updatedTask.id)
            if (index !== -1) {
                state.tasks.splice(index, 1, updatedTask)
            }
        },
        deleteTask(state, taskId) {
            state.tasks = state.tasks.filter(task => task.id !== taskId)
        }
    },
    actions: {
        fetchTasks({commit}) {
            return getTasks().then(response => {
                commit('setTasks', response.data)
            })
        },
        createTask({commit}, task) {
            return createTask(task).then(response => {
                commit('addTask', {...task, id: response.data.id})
            })
        },
        updateTask({commit}, task) {
            return updateTask(task.id, task).then(() => {
                commit('updateTask', task)
            })
        },
        deleteTask({commit}, taskId) {
            return deleteTask(taskId).then(() => {
                commit('deleteTask', taskId)
            })
        }
    }
})
