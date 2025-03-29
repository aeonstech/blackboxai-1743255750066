<?php
require_once 'includes/config.php';
require_once 'includes/header.php';
?>

<!-- Hero Section -->
<div class="relative bg-white overflow-hidden">
    <div class="max-w-7xl mx-auto">
        <div class="relative z-10 pb-8 bg-white sm:pb-16 md:pb-20 lg:max-w-2xl lg:w-full lg:pb-28 xl:pb-32">
            <main class="mt-10 mx-auto max-w-7xl px-4 sm:mt-12 sm:px-6 md:mt-16 lg:mt-20 lg:px-8 xl:mt-28">
                <div class="sm:text-center lg:text-left">
                    <h1 class="text-4xl tracking-tight font-extrabold text-gray-900 sm:text-5xl md:text-6xl">
                        <span class="block">Welcome to</span>
                        <span class="block text-indigo-600"><?php echo SITE_NAME; ?></span>
                    </h1>
                    <p class="mt-3 text-base text-gray-500 sm:mt-5 sm:text-lg sm:max-w-xl sm:mx-auto md:mt-5 md:text-xl lg:mx-0">
                        Join our exclusive membership program and unlock premium benefits. Manage your digital wallet, track your membership status, and enjoy special privileges.
                    </p>
                    <div class="mt-5 sm:mt-8 sm:flex sm:justify-center lg:justify-start">
                        <?php if (!is_logged_in()): ?>
                        <div class="rounded-md shadow">
                            <a href="registration.php" class="w-full flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 md:py-4 md:text-lg md:px-10">
                                Get Started
                            </a>
                        </div>
                        <div class="mt-3 sm:mt-0 sm:ml-3">
                            <a href="login.php" class="w-full flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-md text-indigo-700 bg-indigo-100 hover:bg-indigo-200 md:py-4 md:text-lg md:px-10">
                                Login
                            </a>
                        </div>
                        <?php else: ?>
                        <div class="rounded-md shadow">
                            <a href="profile.php" class="w-full flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 md:py-4 md:text-lg md:px-10">
                                View Profile
                            </a>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
            </main>
        </div>
    </div>
    <div class="lg:absolute lg:inset-y-0 lg:right-0 lg:w-1/2">
        <img class="h-56 w-full object-cover sm:h-72 md:h-96 lg:w-full lg:h-full" src="https://images.unsplash.com/photo-1551434678-e076c223a692?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=2850&q=80" alt="Membership">
    </div>
</div>

<!-- Features Section -->
<div class="py-12 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="lg:text-center">
            <h2 class="text-base text-indigo-600 font-semibold tracking-wide uppercase">Features</h2>
            <p class="mt-2 text-3xl leading-8 font-extrabold tracking-tight text-gray-900 sm:text-4xl">
                Everything you need in one place
            </p>
            <p class="mt-4 max-w-2xl text-xl text-gray-500 lg:mx-auto">
                Our platform provides comprehensive membership management and digital wallet features.
            </p>
        </div>

        <div class="mt-10">
            <div class="space-y-10 md:space-y-0 md:grid md:grid-cols-2 md:gap-x-8 md:gap-y-10">
                <!-- Feature 1 -->
                <div class="relative">
                    <div class="absolute flex items-center justify-center h-12 w-12 rounded-md bg-indigo-500 text-white">
                        <i class="fas fa-id-card text-xl"></i>
                    </div>
                    <p class="ml-16 text-lg leading-6 font-medium text-gray-900">Digital Membership Cards</p>
                    <p class="mt-2 ml-16 text-base text-gray-500">
                        Access your membership card digitally anytime, anywhere. No more physical cards to carry around.
                    </p>
                </div>

                <!-- Feature 2 -->
                <div class="relative">
                    <div class="absolute flex items-center justify-center h-12 w-12 rounded-md bg-indigo-500 text-white">
                        <i class="fas fa-wallet text-xl"></i>
                    </div>
                    <p class="ml-16 text-lg leading-6 font-medium text-gray-900">Digital Wallet</p>
                    <p class="mt-2 ml-16 text-base text-gray-500">
                        Manage your funds securely with our integrated digital wallet system.
                    </p>
                </div>

                <!-- Feature 3 -->
                <div class="relative">
                    <div class="absolute flex items-center justify-center h-12 w-12 rounded-md bg-indigo-500 text-white">
                        <i class="fas fa-bell text-xl"></i>
                    </div>
                    <p class="ml-16 text-lg leading-6 font-medium text-gray-900">Instant Notifications</p>
                    <p class="mt-2 ml-16 text-base text-gray-500">
                        Stay updated with real-time notifications about your membership status and transactions.
                    </p>
                </div>

                <!-- Feature 4 -->
                <div class="relative">
                    <div class="absolute flex items-center justify-center h-12 w-12 rounded-md bg-indigo-500 text-white">
                        <i class="fas fa-shield-alt text-xl"></i>
                    </div>
                    <p class="ml-16 text-lg leading-6 font-medium text-gray-900">Secure Platform</p>
                    <p class="mt-2 ml-16 text-base text-gray-500">
                        Your data and transactions are protected with industry-standard security measures.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- CTA Section -->
<div class="bg-indigo-700">
    <div class="max-w-2xl mx-auto text-center py-16 px-4 sm:py-20 sm:px-6 lg:px-8">
        <h2 class="text-3xl font-extrabold text-white sm:text-4xl">
            <span class="block">Ready to get started?</span>
            <span class="block">Join our membership program today.</span>
        </h2>
        <p class="mt-4 text-lg leading-6 text-indigo-200">
            Experience the convenience of digital membership management and secure wallet services.
        </p>
        <?php if (!is_logged_in()): ?>
        <a href="registration.php" class="mt-8 w-full inline-flex items-center justify-center px-5 py-3 border border-transparent text-base font-medium rounded-md text-indigo-600 bg-white hover:bg-indigo-50 sm:w-auto">
            Sign up now
        </a>
        <?php endif; ?>
    </div>
</div>

<?php require_once 'includes/footer.php'; ?>