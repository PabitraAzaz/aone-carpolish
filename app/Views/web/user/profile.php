<?= $this->extend('web/components/assemble') ?>
<?= $this->section('content') ?>




<style>
    .profile-section {
        padding: 80px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: #f7f7f7;
    }

    .profile-wrap {
        width: 100%;
        max-width: 340px;
    }

    /* Title */
    .profile-title {
        font-size: 22px;
        font-weight: 600;
        color: #3e1f4a;
        margin-bottom: 25px;
    }

    /* Static Info (better than disabled inputs) */
    .profile-group {
        margin-bottom: 18px;
        border-bottom: 1px solid #ddd;
        padding-bottom: 6px;
    }

    .profile-group label {
        font-size: 11px;
        color: #999;
    }

    .profile-value {
        font-size: 14px;
        color: #222;
        margin-top: 2px;
    }

    /* Input Field */
    .profile-field {
        position: relative;
        margin-top: 20px;
        margin-bottom: 20px;
    }

    .profile-field input {
        width: 100%;
        border: none;
        border-bottom: 1px solid #ccc;
        padding: 8px 0;
        font-size: 14px;
        outline: none;
        background: transparent;
    }

    .profile-field label {
        position: absolute;
        left: 0;
        top: 8px;
        font-size: 13px;
        color: #da6510;
    }

    /* Buttons */
    .profile-btn {
        width: 100%;
        padding: 11px 0;
        background: #da6510;
        color: #fff;
        border: none;
        font-size: 14px;
        cursor: pointer;
        margin-top: 10px;
    }

    .logout-btn {
        background: #3e1f4a;
    }

    /* Field */
    .profile-field {
        position: relative;
        margin-bottom: 20px;
    }

    /* Input */
    .profile-field input {
        width: 100%;
        border: none;
        border-bottom: 1px solid #ccc;
        padding: 10px 0 6px;
        /* extra top space */
        font-size: 14px;
        outline: none;
        background: transparent;
    }

    /* Label */
    .profile-field label {
        position: absolute;
        left: 0;
        top: 10px;
        font-size: 13px;
        color: #999;
        transition: 0.25s;
    }

    /* 🔥 FIX: Float label when input has value */
    .profile-field input:focus+label,
    .profile-field input:not(:placeholder-shown)+label {
        top: -10px;
        font-size: 11px;
        color: #da6510;
    }

    /* Active border */
    .profile-field input:focus {
        border-bottom: 1px solid #da6510;
    }
</style>




<!-- =========================================================== -->

<div class="banner ba-banner">
    <h1><span class="typed-text typed-ba">Profile</span></h1>
</div>





<section class="profile-section">
    <div class="profile-wrap">

        <h2 class="profile-title">My Profile</h2>

        <!-- ✅ Success -->
        <?php if (session()->getFlashdata('success')): ?>
            <div class="success-box"><?= session()->getFlashdata('success') ?></div>
        <?php endif; ?>

        <!-- ❌ Error -->
        <?php if (session()->getFlashdata('error')): ?>
            <div class="error-box"><?= session()->getFlashdata('error') ?></div>
        <?php endif; ?>




        <form action="<?= base_url('profile') ?>" method="POST">

            <!-- Name -->
            <div class="profile-field">
                <input type="text" name="full_name" value="<?= session('name') ?>" placeholder=" ">
                <label>Full Name</label>
            </div>

            <!-- Email (readonly recommended) -->
            <div class="profile-field">
                <input type="email" name="email" value="<?= session('email') ?>" readonly>
                <label>Email</label>
            </div>

            <!-- New Password -->
            <div class="profile-field">
                <input type="password" name="password">
                <label>New Password</label>
            </div>

            <!-- Confirm Password -->
            <div class="profile-field">
                <input type="password" name="confirm_password">
                <label>Confirm Password</label>
            </div>

            <button type="submit" class="profile-btn">Update Profile</button>

        </form>



        <button class="profile-btn logout-btn"
            onclick="window.location='<?= base_url('logout') ?>'">
            Logout
        </button>

    </div>
</section>




<!-- ===================================================================  -->

<?= $this->endSection(); ?>