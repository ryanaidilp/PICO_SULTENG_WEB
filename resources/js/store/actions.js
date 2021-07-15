import axios from "axios";

export default {
    loadNationalData({
        commit
    }) {
        commit("SET_NATIONAL_DATA", []);
        axios.get("/api/v1/statistics")
            .then(response => {
                commit("SET_NATIONAL_DATA", response.data);
            })
            .catch(error => {
                console.error(error);
            })
    },
    loadProvincesData({
        commit
    }, province_id) {
        commit("SET_PROVINCES_DATA", []);
        axios.get("/api/v1/statistics/" + province_id)
            .then(response => {
                commit("SET_PROVINCES_DATA", response.data);
            })
            .catch(error => {
                console.error(error);
            })
    },
    loadProvinces({
        commit
    }) {
        commit("SET_PROVINCES", []);
        axios.get("/api/v1/provinces")
            .then(response => {
                commit("SET_PROVINCES", response.data);
            })
            .catch(error => {
                console.error(error);
            })
    },
    loadRegencies({
        commit
    }, province_id) {
        commit("SET_REGENCIES", []);
        axios.get("/api/v1/regencies?province=" + province_id)
            .then(response => {
                commit("SET_REGENCIES", response.data);
            })
            .catch(error => {
                console.error(error);
            })
    },
    loadHospitals({
        commit
    }, province_id) {
        commit("SET_HOSPITALS", []);
        axios.get("/api/v1/hospitals?province=" + province_id)
            .then(response => {
                commit("SET_HOSPITALS", response.data);
            })
            .catch(error => {
                console.error(error);
            })
    },
    loadTaskForces({
        commit
    }, province_id) {
        commit("SET_TASK_FORCES", []);
        axios.get("/api/v1/task_forces?province=" + province_id)
            .then(response => {
                commit("SET_TASK_FORCES", response.data);
            })
            .catch(error => {
                console.error(error);
            })
    },
    loadNationalTests({
        commit
    }) {
        commit("SET_NATIONAL_TESTS", []);
        axios.get("/api/v1/tests")
            .then(response => {
                commit("SET_NATIONAL_TESTS", response.data);
            })
            .catch(error => {
                console.error(error);
            })
    },
    loadProvinceTests({
        commit
    }, province_id) {
        commit("SET_PROVINCE_TESTS", []);
        axios.get("/api/v1/tests?province=" + province_id)
            .then(response => {
                commit("SET_PROVINCE_TESTS", response.data);
            })
            .catch(error => {
                console.error(error);
            });
    },
    loadNationalVaccines({
        commit
    }) {
        commit("SET_NATIONAL_VACCINES", []);
        axios.get("/api/v1/vaccines")
            .then(response => {
                commit("SET_NATIONAL_VACCINES", response.data);
            })
            .catch(error => {
                console.error(error);
            });
    },
    loadProvinceVaccines({
        commit
    }, province_id) {
        commit("SET_PROVINCE_VACCINES", []);
        axios.get("/api/v1/vaccines?province=" + province_id)
            .then(response => {
                commit("SET_PROVINCE_VACCINES", response.data);
            })
            .catch(error => {
                console.error(error);
            });
    }
}
