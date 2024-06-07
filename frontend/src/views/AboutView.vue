<template>
  <div class="about">
    <v-container>
      <h1 class="text-subtitle-2 mb-10">About Project Requisites</h1>
      <v-row>
        <v-col cols="12">
          <p>This project involves developing a todo-list application that enables efficient task management. The
            application will consist of a robust backend and a dynamic frontend.</p>
        </v-col>

        <v-col cols="12">
          <h2 class="text-h5">Backend Requirements:</h2>
          <v-list density="compact">
            <v-list-item>
              <v-list-item-title>Technology:</v-list-item-title>
              <v-list-item-subtitle>The backend should be developed using plain PHP, leveraging the capabilities of
                Object-Oriented Programming extensively. Avoid using any PHP frameworks to ensure the use of raw PHP
                skills.
              </v-list-item-subtitle>
            </v-list-item>

            <v-list-item>
              <v-list-item-title>Design Patterns:</v-list-item-title>
              <v-list-item-subtitle>Apply common design patterns where appropriate to structure the codebase
                effectively, enhancing maintainability and scalability.
              </v-list-item-subtitle>
            </v-list-item>

            <v-list-item>
              <v-list-item-title>REST API:</v-list-item-title>
              <v-list-item-subtitle>Implement a RESTful API to handle CRUD operations for tasks. This API will serve as
                the interface for the frontend to interact with the backend.
              </v-list-item-subtitle>
            </v-list-item>

            <v-list-item>
              <v-list-item-title>Database:</v-list-item-title>
              <v-list-item-subtitle>Use SQL for data storage, employing PHP Data Objects (PDO) for database interactions
                to prevent SQL injection and ensure secure database queries.
              </v-list-item-subtitle>
            </v-list-item>

            <v-list-item>
              <v-list-item-title>Configuration:</v-list-item-title>
              <v-list-item-subtitle>Store all configuration settings in a separate file, which should include database
                credentials and API settings to isolate sensitive information from the core codebase.
              </v-list-item-subtitle>
            </v-list-item>

            <v-list-item>
              <v-list-item-title>Security and Performance:</v-list-item-title>
              <v-list-item-subtitle>Focus on implementing robust security measures, such as sanitizing inputs,
                validating data, and using prepared statements for database interactions. Optimize performance through
                efficient query design and minimizing server response times.
              </v-list-item-subtitle>
            </v-list-item>
          </v-list>
        </v-col>

        <v-col cols="12">
          <h2 class="text-h5">Frontend Requirements:</h2>
          <v-list density="compact">
            <v-list-item>
              <v-list-item-title>Technology:</v-list-item-title>
              <v-list-item-subtitle>Develop the frontend using VueJS, without relying on comprehensive frameworks to
                demonstrate proficiency with the core library.
              </v-list-item-subtitle>
            </v-list-item>

            <v-list-item>
              <v-list-item-title>Tools:</v-list-item-title>
              <v-list-item-subtitle>You are free to use any bundler (like Webpack) and UI kits (such as Vuetify or
                BootstrapVue) to help streamline development and enhance the UI's look and feel.
              </v-list-item-subtitle>
            </v-list-item>

            <v-list-item>
              <v-list-item-title>Functionality:</v-list-item-title>
              <v-list-item-subtitle>The frontend should support adding, editing, and deleting tasks. It must be
                intuitive and user-friendly, with minimalistic design elements that focus on usability.
              </v-list-item-subtitle>
            </v-list-item>

            <v-list-item>
              <v-list-item-title>State Management:</v-list-item-title>
              <v-list-item-subtitle>Implement state management using Vue’s reactivity system or state management
                libraries (e.g., Pinia) to handle data across components effectively.
              </v-list-item-subtitle>
            </v-list-item>

            <v-list-item>
              <v-list-item-title>Reactivity:</v-list-item-title>
              <v-list-item-subtitle>Ensure that the UI updates in real-time as tasks are added, modified, or deleted,
                providing immediate visual feedback to the user.
              </v-list-item-subtitle>
            </v-list-item>

            <v-list-item>
              <v-list-item-title>Security:</v-list-item-title>
              <v-list-item-subtitle>Implement client-side validation and secure data handling practices to protect user
                data and prevent common vulnerabilities.
              </v-list-item-subtitle>
            </v-list-item>
          </v-list>
        </v-col>

        <v-col cols="12">
          <h2 class="text-h5">Overall Goal:</h2>
          <p>The aim is to create a functional and secure todo-list application that demonstrates your ability to work
            with both backend and frontend technologies in a real-world project setting. The application should not only
            fulfill the technical requirements but also deliver a seamless and engaging user experience.</p>
          <p>Additionally, employing advanced techniques such as application containerization, thorough documentation,
            and adherence to industry best practices throughout the development process will be considered a significant
            advantage. These elements will showcase your comprehensive skills in modern software development and your
            commitment to producing high-quality, maintainable, and scalable software.</p>
        </v-col>
      </v-row>
    </v-container>
  </div>
</template>

<script>
export default {
  name: 'AboutView'
}
</script>
