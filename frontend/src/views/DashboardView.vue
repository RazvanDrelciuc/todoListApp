<template>
  <div class="dashboard">
    <v-container>
      <h1 class="text-subtitle-2 mb-10">Dashboard</h1>

      <v-row class="mb-0" align="end">
        <v-btn color="grey-darken-2" variant="text" @click="filterAllTasks">All</v-btn>
        <v-btn color="grey-darken-3" variant="text" @click="filterTodaysTasks">Today's Tasks</v-btn>
        <v-col>
          <v-btn prepend-icon="mdi-plus" class="bg-light-blue float-end" @click="openDialog">
            Add Task
          </v-btn>
        </v-col>
      </v-row>

      <task-list :tasks="filteredTasks" @edit-task="editTask" @delete-task="handleDeleteTask"
                 @update-task="handleUpdateTask"></task-list>

      <task-form
          :task="selectedTask"
          :is-dialog-open="dialog"
          @submit="handleTaskSubmit"
          @close-dialog="closeDialog"
          @update:isDialogOpen="updateDialog"
          @update-task="updateTaskLocal"
      ></task-form>
    </v-container>
  </div>
</template>

<script>
import {format} from 'date-fns';
import TaskForm from '@/components/TaskForm.vue';
import TaskList from '@/components/TaskList.vue';
import {mapState, mapActions} from 'vuex';

export default {
  components: {
    TaskForm,
    TaskList,
  },
  data() {
    return {
      dialog: false,
      selectedTask: {
        title: '',
        description: '',
        due_date: format(new Date(), 'yyyy-MM-dd'),
        status: 0, // Default to 'todo'
      },
      filter: 'all', // Default filter is 'all'
    };
  },
  computed: {
    ...mapState(['tasks']),
    filteredTasks() {
      const today = format(new Date(), 'yyyy-MM-dd');
      if (this.filter === 'today') {
        return this.tasks.filter((task) => {
          const taskDate = format(new Date(task.due_date), 'yyyy-MM-dd');
          return taskDate === today;
        });
      }
      return this.tasks;
    },
  },
  methods: {
    ...mapActions(['fetchTasks', 'createTask', 'updateTask', 'deleteTask']),
    handleTaskSubmit(task) {
      if (task.id) {
        this.updateTask(task).then(() => {
          this.resetSelectedTask();
          this.dialog = false;
        });
      } else {
        this.createTask(task).then(() => {
          this.dialog = false;
          this.resetSelectedTask();
        });
      }
    },
    editTask(task) {
      this.selectedTask = {
        ...task,
        due_date: format(new Date(task.due_date), 'yyyy-MM-dd'),
      };
      this.dialog = true;
    },
    handleDeleteTask(taskId) {
      this.deleteTask(taskId).then(() => {
        this.fetchTasks();
      });
    },
    handleUpdateTask(task) {
      this.updateTask(task).then(() => {
        this.fetchTasks();
      });
    },
    submitForm() {
      this.$refs.taskForm.submitForm();
    },
    resetSelectedTask() {
      this.selectedTask = {
        title: '',
        description: '',
        due_date: format(new Date(), 'yyyy-MM-dd'),
        status: 0, // Default to 'todo'
      };
    },
    openDialog() {
      this.resetSelectedTask();
      this.dialog = true;
    },
    closeDialog() {
      this.dialog = false;
    },
    filterAllTasks() {
      this.filter = 'all';
    },
    filterTodaysTasks() {
      this.filter = 'today';
    },
    updateDialog(val) {
      this.dialog = val;
    },
    updateTaskLocal(updatedTask) {
      this.selectedTask = updatedTask;
    }
  },
  created() {
    this.fetchTasks();
  },
};
</script>
