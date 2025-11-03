<div class="sidebar-menu">
    <ul class="menu">
        <li class="sidebar-title">Menu</li>

        <li class="sidebar-item active ">
            <a href="{{ route('dashboard') }}" class='sidebar-link'>
                <i class="bi bi-grid-fill"></i>
                <span>Dashboard</span>
            </a>
        </li>

        @if (Auth::user()->is_admin == 1)
            <li class="sidebar-item  has-sub">
                <a href="#" class='sidebar-link'>
                    <i class="bi bi-stack"></i>
                    <span class="text-capitalize">profile</span>
                </a>
                <ul class="submenu ">
                    <li class="submenu-item ">
                        <a href="{{ route('sambutan.index') }}" class="text-capitalize">kata sambutan</a>
                    </li>
                    <li class="submenu-item ">
                        <a href="{{ route('visimisi.index') }}" class="text-capitalize">visi dan misi</a>
                    </li>
                    <li class="submenu-item ">
                        <a href="{{ route('organisasi.index') }}" class="text-capitalize">stuktur organisasi</a>
                    </li>
                </ul>
            </li>
            <li class="sidebar-item  ">
                <a href="{{ route('unggulan.index') }}" class='sidebar-link'>
                    <i class="bi bi-file-earmark-spreadsheet-fill"></i>
                    <span class="text-capitalize">program unggulan</span>
                </a>
            </li>

            <li class="sidebar-item  ">
                <a href="{{ route('gallery.index') }}" class='sidebar-link'>
                    <i class="bi bi-file-earmark-spreadsheet-fill"></i>
                    <span class="text-capitalize">gallery</span>
                </a>
            </li>

            <li class="sidebar-item  ">
                <a href="{{ route('hero.index') }}" class='sidebar-link'>
                    <i class="bi bi-file-earmark-spreadsheet-fill"></i>
                    <span class="text-capitalize">hero</span>
                </a>
            </li>

            <li class="sidebar-item  ">
                <a href="{{ route('surat.index') }}" class='sidebar-link'>
                    <i class="bi bi-file-earmark-spreadsheet-fill"></i>
                    <span class="text-capitalize">Surat Al Quran</span>
                </a>
            </li>

            <li class="sidebar-item  ">
                <a href="{{ route('legalitas.index') }}" class='sidebar-link'>
                    <i class="bi bi-file-earmark-spreadsheet-fill"></i>
                    <span class="text-capitalize">legalitas</span>
                </a>
            </li>


            <li class="sidebar-item  ">
                <a href="{{ route('video.index') }}" class='sidebar-link'>
                    <i class="bi bi-file-earmark-spreadsheet-fill"></i>
                    <span class="text-capitalize">video</span>
                </a>
            </li>

            <li class="sidebar-item  ">
                <a href="{{ route('kontak.index') }}" class='sidebar-link'>
                    <i class="bi bi-file-earmark-spreadsheet-fill"></i>
                    <span class="text-capitalize">kontak</span>
                </a>
            </li>

            <li class="sidebar-item  ">
                <a href="{{ route('user.index') }}" class='sidebar-link'>
                    <i class="bi bi-file-earmark-person"></i>
                    <span class="text-capitalize">user</span>
                </a>
            </li>

            <li class="sidebar-item  has-sub">
                <a href="#" class='sidebar-link'>
                    <i class="bi bi-stack"></i>
                    <span class="text-capitalize">administrasi</span>
                </a>
                <ul class="submenu ">
                    <li class="submenu-item ">
                        <a href="{{ route('pengurus-pondok.index') }}" class="text-capitalize">pengurus pondok</a>
                    </li>
                    <li class="submenu-item ">
                        <a href="{{ route('guru.index') }}" class="text-capitalize">guru</a>
                    </li>
                    <li class="submenu-item ">
                        <a href="{{ route('siswa.index') }}" class="text-capitalize">siswa</a>
                    </li>
                </ul>
            </li>
        @endif

        <li class="sidebar-item  has-sub">
            <a href="#" class='sidebar-link'>
                <i class="bi bi-stack"></i>
                <span class="text-capitalize">hafalan</span>
            </a>
            <ul class="submenu ">
                <li class="submenu-item ">
                    <a href="{{ route('bacaan-wudhu-sholat.index') }}" class="text-capitalize">bacaan wudhu dan
                        sholat</a>
                </li>
                <li class="submenu-item ">
                    <a href="{{ route('doa-harian.index') }}" class="text-capitalize">doa harian</a>
                </li>
            </ul>
        </li>

        <li class="sidebar-item  has-sub">
            <a href="#" class='sidebar-link'>
                <i class="bi bi-stack"></i>
                <span class="text-capitalize">PTQ (Pendidikan Tahfidz al-Qur'an)</span>
            </a>
            <ul class="submenu ">
                <li class="submenu-item ">
                    <a href="{{ route('siswaptq.index') }}" class="text-capitalize">Siswa PTQ</a>
                </li>
                <li class="submenu-item ">
                    <a href="{{ route('prestasiptq.index') }}" class="text-capitalize">Prestasi PTQ</a>
                </li>
            </ul>
        </li>

        <li class="sidebar-item  has-sub">
            <a href="#" class='sidebar-link'>
                <i class="bi bi-stack"></i>
                <span class="text-capitalize">TPQ (Taman Pendidikan Quran)</span>
            </a>
            <ul class="submenu ">
                <li class="submenu-item ">
                    <a href="{{ route('siswatpq.index') }}" class="text-capitalize">Siswa TPQ</a>
                </li>
                <li class="submenu-item ">
                    <a href="{{ route('prestasitpq.index') }}" class="text-capitalize">Prestasi TPQ</a>
                </li>
            </ul>
        </li>

        <li class="sidebar-item  has-sub">
            <a href="#" class='sidebar-link'>
                <i class="bi bi-stack"></i>
                <span class="text-capitalize">PTQ dan TPQ</span>
            </a>
            <ul class="submenu ">
                <li class="submenu-item ">
                    <a href="{{ route('siswaptqtpq.index') }}" class="text-capitalize">Siswa PTQ dan TPQ</a>
                </li>
                <li class="submenu-item ">
                    <a href="{{ route('prestasiptqtpq.index') }}" class="text-capitalize">Prestasi PTQ dan TPQ</a>
                </li>
            </ul>
        </li>

        <li class="sidebar-item  ">
            <a href="{{ route('logout') }}" class='sidebar-link'>
                <i class="bi bi-box-arrow-left"></i>
                <span class="text-capitalize">Logout</span>
            </a>
        </li>

    </ul>
</div>
