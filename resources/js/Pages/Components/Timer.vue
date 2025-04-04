<script setup>
const TIME_LIMIT = 60 * 60 * 1000;

if (!localStorage.getItem("startTime")) {
    localStorage.setItem("startTime", new Date().getTime());
}

var countDownDate = parseInt(localStorage.getItem("startTime")) + TIME_LIMIT;


var x = setInterval(function () {
    var now = new Date().getTime();
    var distance = countDownDate - now;

    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    var seconds = Math.floor((distance % (1000 * 60)) / 1000);

    document.getElementById("demo").innerHTML = minutes + "m " + seconds + "s ";

    if (distance < 0) {
        clearInterval(x);
        document.getElementById("demo").innerHTML = "EXPIRED";
        localStorage.removeItem("startTime");
        goToFinish(); 
    }
}, 1000);

function goToFinish() {
    window.location.href = '/finish';
}
</script>

<template>
    <div class="bg-blue-700 rounded-full w-48 h-12 flex items-center justify-center">
        <p class="text-2xl font-bold text-white" id="demo"></p>
    </div>
    
</template>

<style scoped>

</style>

