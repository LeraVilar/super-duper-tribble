module.exports = {
    publicPath: "/super-duper-tribble/",
    chainWebpack: config => {
        config.plugin("html").tap(args => {
            args[0].title = "My Vue App";
            return args;
        });
    }
}