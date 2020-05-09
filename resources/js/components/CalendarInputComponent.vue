<template>
    <form>
        <div class="form-group">
            <label for="eventNameInput">Event</label>
            <input
                type="text"
                class="form-control"
                id="eventNameInput"
                name="eventNameInput"
                placeholder="My Event"
                v-model="name"
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
                v-model="dateRange"
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
                    v-model="days"
                />
                <label class="form-check-label">
                    {{ day }}
                </label>
            </div>
            {{ days }}
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</template>

<script>
import DatePicker from "vue2-datepicker";
export default {
    data() {
        return {
            weekDays: ["Mon", "Tue", "Wed", "Thu", "Fri", "Sat", "Sun"],
            name: "",
            days: [],
            dateRange: "ciao"
        };
    },
    components: {
        DatePicker
    }
};
</script>
