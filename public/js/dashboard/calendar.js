(() => {
    document.addEventListener("DOMContentLoaded", () => {
        const calendarEl = document.getElementById("calendar");
        if (!calendarEl) return;

        const calendar = new FullCalendar.Calendar(calendarEl, {
            locale: "fr",
            initialView: "timeGridWeek",
            allDaySlot: false,
            slotMinTime: "08:00:00",
            slotMaxTime: "21:30:00",
            height: "100%",
            expandRows: true,
            headerToolbar: { left: "prev,next today", center: "title", right: "timeGridWeek,timeGridDay" },
            dayHeaderFormat: { weekday: "long" },
            hiddenDays: [0,6],
            nowIndicator: true,
            slotLabelFormat: { hour: "2-digit", minute: "2-digit", hour12: false },
            slotDuration: "00:30:00",
            events: [
                { title: "Ouvert - Matin", daysOfWeek: [1,3,5], startTime: "10:00", endTime: "12:00", backgroundColor: "#4caf50", borderColor: "#4caf50" },
                { title: "Ouvert - Après-midi", daysOfWeek: [1,3,5], startTime: "16:00", endTime: "20:00", backgroundColor: "#81c784", borderColor: "#81c784" },
                { title: "Ouvert - Matin", daysOfWeek: [2,4], startTime: "10:00", endTime: "12:00", backgroundColor: "#2196f3", borderColor: "#2196f3" },
                { title: "Ouvert - Après-midi", daysOfWeek: [2,4], startTime: "16:00", endTime: "19:30", backgroundColor: "#64b5f6", borderColor: "#64b5f6" }
            ]
        });

        calendar.render();
    });
})();
