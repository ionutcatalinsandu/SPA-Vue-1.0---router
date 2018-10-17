<template>
    <div class="container">
        <div class="columns">
            <div class="column">
                <div class="message" v-for="status in statuses" v-bind:key="status.id">
                    <div class="message-header"> 
                        <p>
                            {{ status.user.name }} said..
                        </p>

                        <p>
                            {{ status.created_at | ago }}
                        </p>
                     </div>

                    <div class="message-body">
                        {{status.body}}
                    </div>
                </div>
                 <add-to-stream @completed="addStatus"> </add-to-stream>
            </div>
        </div>
    </div>
</template>

<script>
import moment from "moment";
import AddToStream from "./components/AddToStream";
export default {
  filters: {
    ago(date) {
      return moment(date).fromNow();
    }
  },
  components: { AddToStream },
  data() {
    return { statuses: [] };
  },
  methods: {
    addStatus(status) {
      this.statuses.unshift(status);
      alert("Your status has been added to the stream!");
    }
  },
  created() {
    axios.get("/statuses").then(response => (this.statuses = response.data));
    // axios.get("/statuses").then(({ data }) => (this.statuses = reponse.data)); //* as putea face si asa!
  }
};
</script>
