const path = require('path');
// import path from 'path';

// ===========================
var config = {
  // TODO: Add common Configuration
  module: {
    rules: [
      {
        test: /\.js$/,
        exclude: /(node_modules|bower_components)/,
        use: {
          loader: 'babel-loader',
          options: {
            presets: ['@babel/preset-env']
          }
        }
      }
    ]
  }
};

var appConfig = Object.assign({}, config, {
  name: "app",
  entry: {
    app: './src/js/app.js',
  },
  output: {
    filename: '[name].js',
    path: path.resolve(__dirname, './js')
  },
});


var adminConfig = Object.assign({}, config, {
  name: "admin",
  entry: {
    admin: './src/js/admin/app-admin.js',
  },
  output: {
    filename: 'app-[name].js',
    path: path.resolve(__dirname, './admin/js')
  },
});



// Return Array of Configurations
module.exports = [
  appConfig,
  adminConfig
  // appCssConfig
];