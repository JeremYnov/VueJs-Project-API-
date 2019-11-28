
<template>
  <footer>
    <div class="flex center copyright">
      <p>© Copyright {{temps}} Conception & Réalisation par Jérémy RICHARD & Louis ARDILLY - All Rights Reserved</p>
    </div>
    <!-- <span>{{ temps }}</span> -->
  </footer>
</template>

<script>
import moment from "moment";
export default {
  components: {},
  data() {
    return {
      m: "",
      temps: ""
    };
  },
  mounted: function() {
    this.m = moment();
    moment.locale("fr");
    this.temps = moment()
      .subtract(10, "days")
      .calendar();
  }
};
</script>

<style lang="css">
footer {
  width: 100%;
  height: 10vh;
  background: #333333;
}

.flex {
  display: flex;
  width: 100%;
  height: 100%;
}

.flex.center {
  justify-content: center;
  align-items: center;
  /* padding: 0 20px; */
}

.copyright p {
  font-size: 12px;
  color: #535353;
}
</style>