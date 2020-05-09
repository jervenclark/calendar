<template>
    <form>
        <div class="form-group">
            <label for="eventNameInput">Event</label>
            <input
                type="text"
                class="form-control"
                id="eventNameInput"
                placeholder="My Event"
                v-model="name"
            />
        </div>
        <div class="form-group">
            <label for="eventDateRangeInput">Date Range</label>
            <div class="input-group input-daterange">
                <input type="text" class="form-control" value="2012-04-05" />
                <div class="input-group-addon">to</div>
                <input type="text" class="form-control" value="2012-04-19" />
            </div>
        </div>
        <div class="form-group">
            <div class="form-check form-check-inline">
                <input
                    class="form-check-input"
                    type="checkbox"
                    id="eventDayMondayInput"
                    value="Mon"
                    v-model="days"
                />
                <label class="form-check-label" for="eventDayMondayInput">
                    Mon
                </label>
            </div>
            <div class="form-check form-check-inline">
                <input
                    class="form-check-input"
                    type="checkbox"
                    id="eventDayTuesdayInput"
                    value="Tue"
                    v-model="days"
                />
                <label class="form-check-label" for="eventDayTuesdayInput">
                    Tue
                </label>
            </div>
            <div class="form-check form-check-inline">
                <input
                    class="form-check-input"
                    type="checkbox"
                    id="eventDayWednesdayInput"
                    value="Wed"
                    v-model="days"
                />
                <label class="form-check-label" for="eventDayWednesdayInput">
                    Wed
                </label>
            </div>
            <div class="form-check form-check-inline">
                <input
                    class="form-check-input"
                    type="checkbox"
                    id="eventDayThursdayInput"
                    value="Thu"
                    v-model="days"
                />
                <label class="form-check-label" for="eventDayThursdayInput">
                    Thu
                </label>
            </div>
            <div class="form-check form-check-inline">
                <input
                    class="form-check-input"
                    type="checkbox"
                    id="eventDayFridayInput"
                    value="Fri"
                    v-model="days"
                />
                <label class="form-check-label" for="eventDayFridayInput">
                    Fri
                </label>
            </div>
            <div class="form-check form-check-inline">
                <input
                    class="form-check-input"
                    type="checkbox"
                    id="eventDaySaturdayInput"
                    value="Sat"
                    v-model="days"
                />
                <label class="form-check-label" for="eventDaySaturdayInput">
                    Sat
                </label>
            </div>
            <div class="form-check form-check-inline">
                <input
                    class="form-check-input"
                    type="checkbox"
                    id="eventDaySundayInput"
                    value="Sun"
                    v-model="days"
                />
                <label class="form-check-label" for="eventDaySundayInput">
                    Sun
                </label>
            </div>
            {{ days }}
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</template>

<script>
export default {
    data() {
        return {
            name: "",
            from_date: "",
            to_date: "",
            days: []
        };
    }
};
</script>
