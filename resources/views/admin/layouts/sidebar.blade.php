<aside id="sidebar" class="sidebar">
    <section class="sidebar-container">
        <section class="sidebar-wrapper">

            <a href="{{ route('admin.home') }}" class="sidebar-link">
                <i class="fas fa-home"></i>
                <span>خانه</span>
            </a>


            <section class="sidebar-part-title">بخش دانش آموزان</section>
            <a href="" class="sidebar-link">
                <i class="fas fa-bars"></i>
                <span>
                    مدیریت دانش آموزان
                </span>
            </a>


            <section class="sidebar-part-title">بخش دروس</section>
            <a href="" class="sidebar-link">
                <i class="fas fa-bars"></i>
                <span>
                    مدیریت دروس
                </span>
            </a>



            <section class="sidebar-part-title">بخش کاربران</section>
            <a href="{{ route('admin.users.index') }}" class="sidebar-link">
                <i class="fas fa-bars"></i>
                <span>کاربران</span>
            </a>
            <a href="" class="sidebar-link">
                <i class="fas fa-bars"></i>
                <span>سطوح دسترسی</span>
            </a>




            <section class="sidebar-part-title">تنظیمات</section>
            <a href="" class="sidebar-link">
                <i class="fas fa-bars"></i>
                <span>تنظیمات</span>
            </a>

        </section>
    </section>
</aside>
