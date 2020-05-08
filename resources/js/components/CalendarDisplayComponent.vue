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
                    'alert-success': day.between
                }"
            >
                <div class="row">
                    <div class="col-4">{{ day.date.format("DD ddd ") }}</div>
                    <div class="col-8">{{ day.between ? event.name : "" }}</div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import moment from "moment";
export default {
    data() {
        return {
            event: {
                id: "",
                name: "",
                from_date: "",
                to_date: "",
                created_at: "",
                updated_at: ""
            },
            totalDays: "",
            days: []
        };
    },
    created() {
        this.fetchEvents();
    },
    methods: {
        fetchEvents() {
            fetch("api/events")
                .then(res => res.json())
                .then(res => {
                    event = res.data[0];
                    if (event) {
                        this.event = event;
                    }
                })
                .finally(_ => {
                    this.days = [...Array(moment().daysInMonth()).keys()].map(
                        key => {
                            var day = moment().date(key + 1);
                            return {
                                date: day,
                                between:
                                    this.event.from_date && this.event.to_date
                                        ? moment(
                                              day.format("YYYY-MM-DD")
                                          ).isBetween(
                                              this.event.from_date,
                                              this.event.to_date,
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
