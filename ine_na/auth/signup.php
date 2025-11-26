
<!DOCTYPE html>
<html lang="en"><head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<title>Sign Up - SSU Portal</title>
<script src="https://cdn.tailwindcss.com?plugins=forms,typography"></script>
<link href="https://fonts.googleapis.com/css2?family=Public+Sans:wght@400;500;700&amp;display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet"/>
<script>
      tailwind.config = {
        darkMode: "class",
        theme: {
          extend: {
            colors: {
              primary: "#00bfa6",
              "background-light": "#f4f7fa",
              "background-dark": "#1a202c",
            },
            fontFamily: {
              display: ["Public Sans", "sans-serif"],
            },
            borderRadius: {
              DEFAULT: "0.75rem",
            },
          },
        },
      };
    </script>
<style>
      .material-symbols-outlined {
        font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
      }
    </style>
</head>
<body class="bg-background-light dark:bg-background-dark font-display text-slate-800 dark:text-slate-200">
<div class="flex min-h-screen flex-col items-center justify-center p-4">
<main class="w-full max-w-md">
<div class="rounded-lg bg-white dark:bg-slate-800 shadow-xl p-8 sm:p-10">
<div class="flex flex-col items-center">
<div class="flex h-16 w-16 items-center justify-center rounded-full bg-teal-100 dark:bg-teal-900/50 mb-4">
<span class="material-symbols-outlined text-3xl text-primary">
                            shield
                        </span>
</div>
<h1 class="text-3xl font-bold text-slate-900 dark:text-white">Create Account</h1>
<p class="mt-2 text-slate-600 dark:text-slate-400">Sign up to access the SSU Portal</p>
</div>

<form class="mt-8 space-y-6" action="signup_process.php" method="POST">
  <div>
    <label class="block text-sm font-medium text-slate-700 dark:text-slate-300" for="username">fullname</label>
      <div class="mt-1">
         <input class="block w-full rounded-lg border-slate-300 dark:border-slate-600 bg-slate-100 dark:bg-slate-700 placeholder-slate-400 dark:placeholder-slate-500 focus:border-primary focus:ring-primary dark:text-white"  name="fullname" placeholder="Enter your fullname" required="" type="text"/>
      </div>
  </div>
  <div>
    <label class="block text-sm font-medium text-slate-700 dark:text-slate-300" for="password">Email</label>
      <div class="mt-1">
         <input  class="block w-full rounded-lg border-slate-300 dark:border-slate-600 bg-slate-100 dark:bg-slate-700 placeholder-slate-400 dark:placeholder-slate-500 focus:border-primary focus:ring-primary dark:text-white"  name="email" placeholder="Enter your password" required="" type="email"/>
      </div>
  </div>
    <div>
    <label class="block text-sm font-medium text-slate-700 dark:text-slate-300" for="username">Username</label>
      <div class="mt-1">
         <input class="block w-full rounded-lg border-slate-300 dark:border-slate-600 bg-slate-100 dark:bg-slate-700 placeholder-slate-400 dark:placeholder-slate-500 focus:border-primary focus:ring-primary dark:text-white"  name="username" placeholder="Enter your username" required="" type="text"/>
      </div>
  </div>
<div>
<label class="block text-sm font-medium text-slate-700 dark:text-slate-300" for="confirm-password">Password</label>
<div class="mt-1">
<input class="block w-full rounded-lg border-slate-300 dark:border-slate-600 bg-slate-100 dark:bg-slate-700 placeholder-slate-400 dark:placeholder-slate-500 focus:border-primary focus:ring-primary dark:text-white"  name="password" placeholder="Enter your password" required="" type="password"/>
</div>ssword
</div>
<div>
<label class="block text-sm font-medium text-slate-700 dark:text-slate-300" for="role">Select your role</label>
<div class="mt-1">
<select class="block w-full rounded-lg border-slate-300 dark:border-slate-600 bg-slate-100 dark:bg-slate-700 text-slate-500 dark:text-slate-400 focus:border-primary focus:ring-primary dark:text-white" id="role" name="role">
<option>Registrar</option>
<option>Teacher</option>
<option>Cashier</option>
</select>
</div>
</div>
<div class="flex items-center justify-between pt-4">
<a class="font-medium text-slate-600 dark:text-slate-400 hover:text-primary dark:hover:text-primary transition-colors" href="login.php">Log In</a>
<button  type="submit" name="submit">
                            Sign Up
                        </button>
</div>
</form>

</div>
</main>
<footer class="mt-8 text-center text-sm text-slate-500 dark:text-slate-400">
<p>© 2024 SSU WEB SYSTEM. All Rights Reserved.</p>
</footer>
</div>

</body></html>