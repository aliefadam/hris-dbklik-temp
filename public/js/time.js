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
