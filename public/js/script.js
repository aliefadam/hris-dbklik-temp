const sideBar = document.querySelector("aside");
const main = document.querySelector("main");
const nav = document.querySelector("nav");

const btnHideSideBar = document.querySelector(".btn-hide-side");
btnHideSideBar.addEventListener("click", () => {
    if (!sideBar.classList.contains("active")) {
        sideBar.querySelector("h1").style.display = "none";
    } else {
        setTimeout(() => {
            sideBar.querySelector("h1").style.display = "block";
        }, 200);
    }
    nav.classList.toggle("active");
    sideBar.classList.toggle("active");
    main.classList.toggle("active");
});

const btnSetting = document.querySelector(".btn-setting");
const settingExtra = document.querySelector(".setting-extra");
const notificationExtra = document.querySelector(".notification-extra");
const btnNotification = document.querySelector(".btn-notification");

btnSetting.addEventListener("click", () => {
    settingExtra.classList.toggle("show");
});

btnNotification.addEventListener("click", () => {
    notificationExtra.classList.toggle("show");
});

document.addEventListener("click", function ({ target }) {
    if (
        target != btnSetting &&
        target != document.querySelector(".gear") &&
        target != document.querySelector(".panah-bawah")
    ) {
        settingExtra.classList.remove("show");
    }
});

document.addEventListener("click", ({ target }) => {
    if (
        target != btnNotification &&
        target != document.querySelector(".notif")
    ) {
        notificationExtra.classList.remove("show");
    }
});

document.addEventListener("scroll", function () {
    if (window.scrollY > 10) {
        if (!window.matchMedia("(max-width: 768px)").matches) {
            nav.classList.remove("px-2", "md:px-0");
            nav.classList.add("bg-white", "shadow-xl", "px-5");
            settingExtra.style.right = "60px";
            notificationExtra.style.right = "110px";
        } else {
            nav.classList.add("bg-white", "shadow-xl", "px-3");
            settingExtra.style.right = "20px";
            notificationExtra.style.right = "60px";
        }
    } else {
        if (!window.matchMedia("(max-width: 768px)").matches) {
            nav.classList.remove("bg-white", "shadow-xl", "px-5");
            nav.classList.add("px-2", "md:px-0");
            settingExtra.style.right = "40px";
            notificationExtra.style.right = "90px";
        } else {
            nav.classList.remove("bg-white", "shadow-xl", "px-3");
            settingExtra.style.right = "10px";
            notificationExtra.style.right = "50px";
        }
    }
});

function format(time) {
    return time.toString().length == 1
        ? `0${time.toString()}`
        : time.toString();
}

function showTime() {
    const jam = format(new Date().getHours());
    const menit = format(new Date().getMinutes());
    const detik = format(new Date().getSeconds());

    const day = new Date().getDay();
    const dayArray = [
        "Minggu",
        "Senin",
        "Selasa",
        "Rabu",
        "Kamis",
        "Jum'at",
        "Sabtu",
    ];
    const dayIndo = dayArray[day];

    const date = format(new Date().getDate());
    const month = new Date().getMonth();
    const monthArray = [
        "Januari",
        "Februari",
        "Maret",
        "April",
        "Mei",
        "Juni",
        "Juli",
        "Agustus",
        "September",
        "Oktober",
        "November",
        "Desember",
    ];
    const monthIndo = monthArray[month];
    const year = new Date().getFullYear();

    const spanJam = nav.querySelector(".left span.jam");
    const spanHari = nav.querySelector(".left span.hari");
    const spanTanggal = nav.querySelector(".left span.tanggal");
    spanJam.innerHTML = `${jam}:${menit}:${detik}`;
    spanHari.innerHTML = `${dayIndo},`;
    spanTanggal.innerHTML = `${date} ${monthIndo} ${year}`;
}

setInterval(() => {
    showTime();
}, 1000);

showTime();
