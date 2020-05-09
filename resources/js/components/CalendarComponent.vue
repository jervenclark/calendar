<template>
    <div class="row">
        <div class="col-12">
            <div class="row">
                <div class="col-12 pt-3">
                    <h1>Calendar</h1>
                    <hr />
                </div>
            </div>
            <div class="row">
                <div class="col-5">
                    <calendar-input-component
                        v-on:calendarEventAdded="refreshEvents"
                    ></calendar-input-component>
                </div>
                <div class="col-7">
                    <calendar-display-component
                        :eventId="eventId"
                    ></calendar-display-component>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import CalendarDisplayComponent from "./CalendarDisplayComponent";
import CalendarInputComponent from "./CalendarInputComponent";
export default {
    data() {
        return {
            eventId: -1
        };
    },
    methods: {
        refreshEvents(eventId) {
            this.eventId = eventId;
        }
    },
    components: {
        CalendarDisplayComponent,
        CalendarInputComponent
    }
};
</script>
