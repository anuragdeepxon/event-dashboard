module.exports = {
  content: [
    './resources/**/*.blade.php',
    './resources/**/*.js',
    './resources/**/*.vue',
  ],
  daisyui: {
    themes: [
      {
        mytheme: {
          primary: '#2563eb',

          secondary: '#e0e7ff',

          accent: '#1FB2A6',

          neutral: '#191D24',

          'base-100': '#2A303C',

          info: '#3ABFF8',

          success: '#36D399',

          warning: '#FBBD23',

          error: '#F87272',
        },
      },
    ],
  },
  plugins: [
    require('daisyui'),
  
  ],
}
