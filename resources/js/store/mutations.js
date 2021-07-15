export default {
    SET_NATIONAL_DATA(state, national_data) {
        state.national_data = national_data;
    },
    SET_PROVINCES_DATA(state, provinces_data) {
        state.provinces_data = provinces_data;
    },
    SET_REGENCIES_DATA(state, regencies_data) {
        state.regencies_data = regencies_data;
    },
    SET_PROVINCES(state, provinces) {
        state.provinces = provinces;
    },
    SET_REGENCIES(state, regencies) {
        state.regencies = regencies;
    },
    SET_HOSPITALS(state, hospitals) {
        state.hospitals = hospitals;
    },
    SET_TASK_FORCES(state, task_forces) {
        state.task_forces = task_forces;
    },
    SET_NATIONAL_TESTS(state, national_tests) {
        state.national_tests = national_tests;
    },
    SET_PROVINCE_TESTS(state, province_tests) {
        state.province_tests = province_tests;
    },
    SET_NATIONAL_VACCINES(state, national_vaccines) {
        state.national_vaccines = national_vaccines;
    },
    SET_PROVINCE_VACCINES(state, province_vaccines) {
        state.province_vaccines = province_vaccines;
    }
}
