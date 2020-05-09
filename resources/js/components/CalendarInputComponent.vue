<template>
    <form @submit.prevent="addEvent" class="mt-4 pt-3">
        <div class="form-group">
            <label for="eventNameInput">Event</label>
            <input
                type="text"
                class="form-control"
                id="eventNameInput"
                name="eventNameInput"
                placeholder="My Event"
                v-model="event.name"
            />
        </div>
        <div class="form-group">
            <label for="eventDateRangeInput">Date Range</label>
            <date-picker
                class="d-block w-100"
                id="eventDateRangeInput"
                name="eventDateRangeInput"
                range
                format="YYYY-MM-DD"
                v-model="event.dateRange"
            ></date-picker>
        </div>
        <div class="form-group">
            <div
                class="form-check form-check-inline"
                v-for="(day, index) in weekDays"
            >
                <input
                    class="form-check-input"
                    type="checkbox"
                    :value="{ day }"
                    v-model="event.days"
                />
                <label class="form-check-label">
                    {{ day }}
                </label>
            </div>
        </div>
        <button
            type="submit"
            class="btn btn-primary"
            v-bind:class="{ disabled: processing }"
        >
            Submit
        </button>
    </form>
</template>

<script>
import DatePicker from "vue2-datepicker";
import moment from "moment";
export default {
    data() {
        return {
            weekDays: ["Mon", "Tue", "Wed", "Thu", "Fri", "Sat", "Sun"],
            event: {
                name: "",
                days: [],
                dateRange: []
            },
            processing: false
        };
    },
    components: {
        DatePicker
    },
    methods: {
        addEvent() {
            this.processing = true;
            var dates = this.event.dateRange.map(date =>
                moment(date).format("YYYY-MM-DD")
            );
            var body = {
                name: this.event.name,
                from_date: dates[0],
                to_date: dates[1],
                days: this.event.days.map(d => d.day).join(" ")
            };
            fetch("api/events", {
                method: "post",
                body: JSON.stringify(body),
                headers: {
                    "content-type": "application/json"
                }
            })
                .then(res => res.json())
                .then(res => {
                    if (res.id) {
                        this.$emit("calendarEventAdded", res.id);
                        this.event = {
                            name: "",
                            days: [],
                            dateRange: []
                        };
                    }
                })
                .finally(_ => {
                    this.processing = false;
                });
        }
    }
};
</script>
