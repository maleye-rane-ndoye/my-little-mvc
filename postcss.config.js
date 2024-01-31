module.exports = {
    plugins: [
      tailwindcss('tailwind.config.js'),
      autoprefixer({
        browsers: 'last 2 versions',
      }),
    ],
  };