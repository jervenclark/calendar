<template>
    <div class="card border-0">
        <div class="card-header">
            <h2>{{ moment().format("MMMM YYYY") }}</h2>
        </div>
        <div class="card-body p-0">
            <div
                v-for="day in days"
                class="border-bottom p-3"
                v-bind:class="{
                    'alert-success': day.valid
                }"
            >
                <div class="row">
                    <div class="col-4">{{ day.date.format("DD ddd ") }}</div>
                    <div class="col-8">{{ day.valid ? event.name : "" }}</div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import moment from "moment";
export default {
    props: {
        eventId: Number
    },
    data() {
        return {
            event: {
                id: "",
                name: "",
                from_date: "",
                to_date: "",
                created_at: "",
                updated_at: "",
                days: []
            },
            days: []
        };
    },
    created() {
        this.fetchEvents();
    },
    watch: {
        eventId: function() {
            this.fetchEvents();
        }
    },
    methods: {
        fetchEvents() {
            fetch("api/events")
                .then(res => res.json())
                .then(res => {
                    if (res.data[0]) {
                        this.event = res.data[0];
                    }
                })
                .finally(_ => {
                    this.days = [...Array(moment().daysInMonth()).keys()].map(
                        key => {
                            var { days, from_date, to_date } = this.event;
                            var day = moment().date(key + 1);
                            return {
                                date: day,
                                valid:
                                    days.includes(day.format("ddd")) &&
                                    from_date &&
                                    to_date
                                        ? moment(
                                              day.format("YYYY-MM-DD")
                                          ).isBetween(
                                              from_date,
                                              to_date,
                                              null,
                                              "[]"
                                          )
                                        : false
                            };
                        }
                    );
                });
        }
    }
};
</script>
