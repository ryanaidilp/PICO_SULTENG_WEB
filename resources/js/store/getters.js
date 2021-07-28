export default {
    getStatsByDay(state, day) {
        return state.provinces_data.find(stats => stats.day === day);
    },
    getProvince(state, province_id) {
        return state.provinces.find(province => province.id === province_id);
    },
    getRegency(state, regency_id) {
        return state.regencies.find(regency => regency.id === regency_id);
    }
}
