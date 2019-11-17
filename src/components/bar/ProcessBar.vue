<template>
  <div class="process-bar-container">
    <div class="container">
      <img class="principal-img" src="http://giphygifs.s3.amazonaws.com/media/10mJmNzfUvS0mI/giphy.gif" alt />
      <div class="loading-bar-wrapper">
        <div class="loading-bar">
          <div class="percentage" :style="{'width' : percentage + '%'}">
            <img class="percentage-img" src="https://media.tenor.com/images/fe61dc2b7ef08a538b906eced7fa5cb5/tenor.gif" :style="{'left': percentage + '%'}" alt /></div>
        </div>
        <div class="percent">{{percent}}%</div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      percentage: 0
    };
  },
  computed: {
    percent() {
      return this.percentage.toFixed();
    }
  },
  created() {
    var intval = setInterval(() => {
      if (this.percentage < 100) this.percentage += 0.1;
      else clearInterval(intval);
    }, 4.5);
  }
};
</script>

<style lang="css" scoped>
.process-bar-container {
  font-family: Arial, Helvetica, sans-serif;
  font-size: 1rem;
  color: #222;
  width: 100%;
  height: 100vh;
  background:#f2f4f3;
  display: flex;
  justify-content: center;
  align-items: center;
}

.container {
  text-align: center;
  color: #555;
  min-width: 50%;
}

.principal-img{
    height: 300px
}
.loading-bar-wrapper{
  display: flex;
  align-items: center;
}
.percentage-img{
  position: absolute;
  height: 100%;
}
.percent{
  font-size: 25px;
  width : 65px;
  padding-left: 15px;
}
.loading-bar {
  position: relative;
  width: 100%;
  height: 40px;
  border-radius: 15px;
  overflow: hidden;
  border-bottom: 1px solid #ddd;
  box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.4), 0 -1px 1px #fff, 0 1px 0 #fff;
}
.loading-bar .percentage {
  position: absolute;
  top: 1px;
  left: 1px;
  right: 1px;
  display: block;
  height: 100%;
  border-radius: 15px;
  background-color: #f7e902;
  background-size: 30px 30px;
  background-image: linear-gradient(135deg, rgba(255, 255, 255, 0.3) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, 0.3) 50%, rgba(255, 255, 255, 0.3) 75%, transparent 75%, transparent);
  animation: animate-stripes 3s linear infinite;
}

@keyframes animate-stripes {
  0% {
    background-position: 0 0;
  }
  100% {
    background-position: 60px 0;
  }
}
</style>
