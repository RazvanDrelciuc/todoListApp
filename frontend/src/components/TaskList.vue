<template>
  <v-container>
    <v-row v-if="tasks.length > 0">
      <v-col v-for="task in tasks" :key="task.id" cols="12">
        <v-card variant="flat" class="pa-3 bg-grey-lighten-4" :class="task.status === 1 ? 'task done' : 'task todo'">
          <v-row>
            <v-col class="pl-0" cols="2" md="2">
              <v-btn
                  :color="task.status === 1 ? 'green-lighten-2' : 'red-lighten-2'"
                  :icon="task.status === 1 ? 'mdi-thumb-up' : 'mdi-thumb-down'"
                  variant="text"
                  @click="toggleStatus(task)"
              ></v-btn>
            </v-col>
            <v-col cols="10" md="4">
              <div class="caption grey--text">{{ task.title }}</div>
              <div class="caption grey--text">{{ task.description }}</div>
            </v-col>

            <v-col cols="6" sm="4" md="2">
              <div class="caption grey--text">Status</div>
              <div>{{ task.status === 1 ? 'Done' : 'Todo' }}</div>
            </v-col>

            <v-col cols="6" sm="4" md="2">
              <div class="caption grey--text">Due date</div>
              <div>{{ formattedDate(task.due_date) }}</div>
            </v-col>

            <v-col cols="6" sm="2" md="2">
              <v-menu>
                <template v-slot:activator="{ props }">
                  <v-btn variant="text" color="grey" class="float-end" icon="mdi-dots-vertical" v-bind="props"></v-btn>
                </template>
                <v-list>
                  <v-list-item @click="editTask(task)">
                    <v-list-item-title>Edit</v-list-item-title>
                  </v-list-item>
                  <v-list-item @click="deleteTask(task.id)">
                    <v-list-item-title>Delete</v-list-item-title>
                  </v-list-item>
                </v-list>
              </v-menu>
            </v-col>
          </v-row>
        </v-card>
      </v-col>
    </v-row>
    <v-row v-else>
      <v-col cols="12">
        <v-alert type="info">
          No tasks available.
        </v-alert>
      </v-col>
    </v-row>
  </v-container>
</template>

<script>
import {format} from 'date-fns';

export default {
  props: {
    tasks: {
      type: Array,
      required: true
    }
  },
  methods: {
    editTask(task) {
      this.$emit('edit-task', task)
    },
    deleteTask(taskId) {
      this.$emit('delete-task', taskId)
    },
    toggleStatus(task) {
      task.status = task.status === 1 ? 0 : 1;
      this.$emit('update-task', task);
    },
    formattedDate(date) {
      return format(new Date(date), 'yyyy-MM-dd');
    },
  }
}
</script>

<style>
.task.done {
  border-left: 10px solid chartreuse;
}

.task.todo {
  border-left: 10px solid orangered;
}
</style>
