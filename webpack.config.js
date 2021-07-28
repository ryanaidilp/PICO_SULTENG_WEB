const path = require("path");

module.exports = {
    resolve: {
        alias: {
            "@": path.resolve("resources/js"),
        },
    },
    output: {
        chunkFilename: "js/chunks/[name].js?id=[chunkhash]",
        publicPath: "./"
    },
};
