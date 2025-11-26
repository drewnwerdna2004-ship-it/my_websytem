
<!DOCTYPE html>
<html lang="en"><head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<title>Login - SSU Portal</title>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&amp;display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet"/>
<script src="https://cdn.tailwindcss.com?plugins=forms,typography"></script>
<script>
      tailwind.config = {
        darkMode: "class",
        theme: {
          extend: {
            colors: {
              primary: "#00bfa6",
              "background-light": "#f3f4f6",
              "background-dark": "#111827",
            },
            fontFamily: {
              display: ["Inter", "sans-serif"],
            },
            borderRadius: {
              DEFAULT: "0.5rem",
            },
          },
        },
      };
    </script>
<style>.form-select {
    background-image: url(https://lh3.googleusercontent.com/aida-public/AB6AXuCe-_L10NtJUhds7pWFCHN2lpJa5lUfuEw_dhE13cLARzDx7LwOUEzz02h0spRR0DHSrjRf1aJNE3DNCT7AR80LI002aY1r7Bl31c_WijIC04345KrmUv65GM8Z5x9XUZ1JM9kTSnEShv2F7eMBJGkeWuwFhdJFyigquMry0hBsYYPZm1b8XguxsJBIl6sSf4UgUdmU6EMs6eCdSPCEcHafUdO0oZeN7o14gKHHlpKsPqDAlBAkO_gfLTk76do2iVeqfn1seU11zQ);
    background-position: right 0.5rem center;
    background-repeat: no-repeat;
    background-size: 1.5em 1.5em;
    padding-right: 2.5rem;
    -webkit-appearance: none;
    -moz-appearance: none;
    appearance: none
    }
.dark .form-select {
    background-image: url(https://lh3.googleusercontent.com/aida-public/AB6AXuCe-_L10NtJUhds7pWFCHN2lpJa5lUfuEw_dhE13cLARzDx7LwOUEzz02h0spRR0DHSrjRf1aJNE3DNCT7AR80LI002aY1r7Bl31c_WijIC04345KrmUv65GM8Z5x9XUZ1JM9kTSnEShv2F7eMBJGkeWuwFhdJFyigquMry0hBsYYPZm1b8XguxsJBIl6sSf4UgUdmU6EMs6eCdSPCEcHafUdO0oZeN7o14gKHHlpKsPqDAlBAkO_gfLTk76do2iVeqfn1seU11zQ)
    }</style>
</head>
<body class="font-display bg-background-light dark:bg-background-dark">
<div class="flex items-center justify-center min-h-screen px-4">
<div class="w-full max-w-md bg-white dark:bg-gray-800 p-8 md:p-12 rounded-lg shadow-lg">
<div class="text-center mb-8">
<div class="inline-flex items-center justify-center h-16 w-16 bg-teal-100 dark:bg-teal-900/50 rounded-full mb-6">
<span class="material-icons-outlined text-3xl text-primary">
                        security
                    </span>
</div>
<h1 class="text-3xl font-bold text-gray-900 dark:text-white">Welcome</h1>
<p class="text-gray-600 dark:text-gray-400 mt-2">Log in to the SSU Portal</p>
</div>
<form class="space-y-6" action="login_process.php" method="POST">
<div>
<label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2" for="username">Username</label>
<input class="w-full px-4 py-3 bg-gray-100 dark:bg-gray-700 border-transparent rounded-md focus:border-primary focus:ring-primary text-gray-700 dark:text-gray-200 placeholder-gray-400 dark:placeholder-gray-500" id="username" name="username" placeholder="Enter your username" type="text"/>
</div>
<div>
<label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2" for="password">Password</label>
<input class="w-full px-4 py-3 bg-gray-100 dark:bg-gray-700 border-transparent rounded-md focus:border-primary focus:ring-primary text-gray-700 dark:text-gray-200 placeholder-gray-400 dark:placeholder-gray-500" id="password" name="password" placeholder="Enter your password" type="password"/>
</div>
<div>
<label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2" for="role">Select your role</label>
<select class="form-select w-full px-4 py-3 bg-gray-100 dark:bg-gray-700 border-transparent rounded-md focus:border-primary focus:ring-primary text-gray-500 dark:text-gray-400" id="role" name="role" required>
<option>cashier</option>
<option>teacher</option>
<option>registrar</option>
</select>
</div>
<div class="flex items-center justify-between flex-wrap gap-4 pt-2">
<a class="text-sm font-medium text-primary hover:underline" href="#">Forgot password?</a>
<div class="flex items-center gap-2">
    <a href="signup.php">
<button class="px-6 py-3 bg-gray-200 dark:bg-gray-600 text-gray-800 dark:text-gray-200 font-semibold rounded-md hover:bg-gray-300 dark:hover:bg-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-400 dark:focus:ring-offset-gray-800" type="button">Sign Up</button>
</a>
<button class="px-6 py-3 bg-primary text-white font-semibold rounded-md hover:bg-teal-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary dark:focus:ring-offset-gray-800" type="submit" name="login">Log In</button>
</div>
</div>
</form>
</div>
</div>

</body></html>