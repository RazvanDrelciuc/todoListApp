<template>
  <v-dialog :model-value="isDialogOpen" @update:model-value="updateDialogVisibility" max-width="600">
    <v-card>
      <v-card-title>
        <span class="headline">{{ dialogTitle }}</span>
      </v-card-title>
      <v-card-text>
        <v-form ref="form" v-model="formValid" @submit.prevent="submitForm">
          <v-text-field
              v-model="localTask.title"
              label="Title"
              :rules="[v => !!v || 'Title is required']"
              required
          ></v-text-field>
          <v-textarea
              v-model="localTask.description"
              label="Description"
              :rules="[v => !!v || 'Description is required']"
              required
          ></v-textarea>
          <v-menu v-model="isMenuOpen" :close-on-content-click="false">
            <template v-slot:activator="{ props }">
              <v-text-field
                  label="Selected date"
                  :model-value="formattedDate"
                  readonly
                  v-bind="props"
              ></v-text-field>
            </template>
            <v-date-picker v-model="selectedDate" @input="updateDate"></v-date-picker>
          </v-menu>
        </v-form>
      </v-card-text>
      <v-card-actions>
        <v-spacer></v-spacer>
        <v-btn text="Close" @click="closeDialog">Close</v-btn>
        <v-btn color="primary" text="Save" @click="submitForm">Save</v-btn>
      </v-card-actions>
    </v-card>
  </v-dialog>
</template>

<script>
import { ref } from 'vue';
import { format } from 'date-fns';

export default {
  props: {
    task: {
      type: Object,
      default: () => ({
        title: '',
        description: '',
        due_date: ''
      })
    },
    isDialogOpen: {
      type: Boolean,
      default: false
    }
  },
  data() {
    return {
      localTask: { ...this.task },
      isMenuOpen: false,
      selectedDate: ref(null),
      formValid: ref(false),
    };
  },
  computed: {
    formattedDate() {
      return this.selectedDate ? format(this.selectedDate, 'yyyy-MM-dd') : '';
    },
    dialogTitle() {
      return this.task.id ? 'Edit Task' : 'Add Task';
    }
  },
  watch: {
    task: {
      handler(newTask) {
        this.localTask = { ...newTask };
        this.selectedDate = newTask.due_date ? new Date(newTask.due_date) : null;
      },
      immediate: true,
      deep: true
    }
  },
  methods: {
    submitForm() {
      this.$refs.form.validate();
      if (this.formValid) {
        const taskWithFormattedDate = {
          ...this.localTask,
          due_date: this.selectedDate ? format(this.selectedDate, 'yyyy-MM-dd HH:mm:ss') : ''
        };
        this.$emit('submit', taskWithFormattedDate);
      }
    },
    updateDate(date) {
      this.selectedDate = date;
      this.localTask.due_date = this.selectedDate ? format(this.selectedDate, 'yyyy-MM-dd HH:mm:ss') : '';
      this.$emit('update-task', this.localTask);
    },
    closeDialog() {
      this.$emit('close-dialog');
    },
    updateDialogVisibility(val) {
      this.$emit('update:isDialogOpen', val);
    }
  }
};
</script>
