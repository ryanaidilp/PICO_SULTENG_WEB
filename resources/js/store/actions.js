import axios from "axios";

export default {
    loadNationalData({
        commit
    }) {
        commit("SET_NATIONAL_DATA", []);
        axios.get("/api/v1/statistics")
            .then(response => {
                commit("SET_NATIONAL_DATA", response.data.data);
            })
            .catch(error => {
                console.error(error);
            })
    },
    loadProvinceData({
        commit
    }, province_id) {
        commit("SET_PROVINCE_DATA", []);
        axios.get("/api/v1/statistics?province=" + province_id)
            .then(response => {
                commit("SET_PROVINCE_DATA", response.data.data);
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
                commit("SET_PROVINCES", response.data.data);
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
                commit("SET_REGENCIES", response.data.data);
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
                commit("SET_HOSPITALS", response.data.data);
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
                commit("SET_TASK_FORCES", response.data.data);
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
                commit("SET_NATIONAL_TESTS", response.data.data);
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
                commit("SET_PROVINCE_TESTS", response.data.data);
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
                commit("SET_NATIONAL_VACCINES", response.data.data);
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
                commit("SET_PROVINCE_VACCINES", response.data.data);
            })
            .catch(error => {
                console.error(error);
            });
    },
    loadNationalVaccine({
        commit
    }) {
        commit("SET_NATIONAL_VACCINE", {});
        axios.get("/api/v1/vaccine/latest")
            .then(response => {
                commit("SET_NATIONAL_VACCINE", response.data.data);
            })
            .catch(error => {
                console.error(error);
            });
    },
    loadProvinceVaccine({
        commit
    }, province_id) {
        commit("SET_PROVINCE_VACCINE", {});
        axios.get("/api/v1/vaccine/latest?province=" + province_id)
            .then(response => {
                commit("SET_PROVINCE_VACCINE", response.data.data);
            })
            .catch(error => {
                console.error(error);
            });
    },
    loadNational({
        commit
    }) {
        commit("SET_NATIONAL", {});
        axios.get("/api/v1/statistics/latest")
            .then(response => {
                commit("SET_NATIONAL", response.data.data);
            })
            .catch(error => {
                console.error(error);
            })
    },
    loadLocal({
        commit
    }) {
        commit("SET_LOCAL", {});
        axios.get("/api/v1/statistics/latest?province=72")
            .then(response => {
                commit("SET_LOCAL", response.data.data);
            })
            .catch(error => {
                console.error(error);
            })
    },
    loadRegenciesWithDaily({
        commit
    }, province_id) {
        commit("SET_REGENCIES_DAILY", []);
        axios.get(`/api/v1/regencies/all/${province_id}`)
            .then(response => {
                commit("SET_REGENCIES_DAILY", response.data.data);
            })
            .catch(error => {
                console.error(error);
            })
    }
}
