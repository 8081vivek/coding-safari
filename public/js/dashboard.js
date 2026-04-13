        document.addEventListener('DOMContentLoaded', function() {
            // DOM Elements
            const sidebar = document.querySelector('.sidebar');
            const mobileMenuBtn = document.getElementById('mobileMenuBtn');
            const navLinks = document.querySelectorAll('.nav-link[data-tab]');
            const tabContents = document.querySelectorAll('.main-content > .tab-content');
            const logoutBtn = document.getElementById('logoutBtn');
            const notificationBtn = document.querySelector('.notification-btn');
            
            // Homepage Elements
            const homepageTabs = document.querySelectorAll('#homepage .tab');
            const homepageContents = document.querySelectorAll('#homepage .tab-content');
            
            // Modal Elements
            const modal = document.getElementById('addCategoryModal');
            const addCategoryBtn = document.getElementById('addCategoryBtn');
            const closeModalBtn = document.getElementById('closeCategoryModal');
            const cancelBtn = document.getElementById('cancelCategoryBtn');
            const categoryForm = document.getElementById('categoryForm');
            
            // Icon selector
            const iconOptions = document.querySelectorAll('.icon-option');
            const selectedIconInput = document.getElementById('selectedIcon');
            
            // ========== MAIN TAB SWITCHING ==========
            function activateMainTab(tabId) {
                // Remove active class from all nav links and tab contents
                navLinks.forEach(link => link.classList.remove('active'));
                tabContents.forEach(content => content.classList.remove('active'));
                
                // Add active class to selected tab
                const activeLink = document.querySelector(`.nav-link[data-tab="${tabId}"]`);
                const activeContent = document.getElementById(tabId);
                
                if (activeLink && activeContent) {
                    activeLink.classList.add('active');
                    activeContent.classList.add('active');
                    
                    // Save to localStorage
                    localStorage.setItem('activeMainTab', tabId);
                    return true;
                }
                return false;
            }
            
            // Add click handlers to main nav links
            navLinks.forEach(link => {
                link.addEventListener('click', function(e) {
                    e.preventDefault();
                    const tabId = this.getAttribute('data-tab');
                    activateMainTab(tabId);
                    
                    // Close sidebar on mobile
                    if (window.innerWidth <= 768 && sidebar) {
                        sidebar.classList.remove('active');
                    }
                });
            });
            
            // ========== HOMEPAGE INNER TABS ==========
            function activateHomepageTab(tabId) {
                // Remove active class from all homepage tabs and contents
                homepageTabs.forEach(tab => tab.classList.remove('active'));
                homepageContents.forEach(content => content.classList.remove('active'));
                
                // Add active class to selected tab
                const activeTab = document.querySelector(`#homepage .tab[data-tab="${tabId}"]`);
                const activeContent = document.getElementById(tabId);
                
                if (activeTab && activeContent) {
                    activeTab.classList.add('active');
                    activeContent.classList.add('active');
                    
                    // Save to localStorage
                    localStorage.setItem('activeHomeTab', tabId);
                    return true;
                }
                return false;
            }
            
            // Add click handlers to homepage tabs
            homepageTabs.forEach(tab => {
                tab.addEventListener('click', function() {
                    const tabId = this.getAttribute('data-tab');
                    activateHomepageTab(tabId);
                });
            });
            
            // ========== RESTORE SAVED TABS ==========
            // Restore main tab
            const savedMainTab = localStorage.getItem('activeMainTab');
            if (savedMainTab && document.getElementById(savedMainTab)) {
                activateMainTab(savedMainTab);
            } else {
                // Default to dashboard
                activateMainTab('dashboard');
            }
            
            // Restore homepage tab if homepage is active
            const savedHomeTab = localStorage.getItem('activeHomeTab');
            if (savedHomeTab && document.getElementById('homepage').classList.contains('active')) {
                activateHomepageTab(savedHomeTab);
            }
            
            // ========== MOBILE MENU ==========
            if (mobileMenuBtn && sidebar) {
                mobileMenuBtn.addEventListener('click', function() {
                    sidebar.classList.toggle('active');
                });
            }
            
            // Close sidebar when clicking outside on mobile
            document.addEventListener('click', function(e) {
                if (window.innerWidth <= 768 && 
                    sidebar && 
                    !sidebar.contains(e.target) && 
                    !mobileMenuBtn.contains(e.target) && 
                    sidebar.classList.contains('active')) {
                    sidebar.classList.remove('active');
                }
            });
            
            // Close sidebar on escape key
            document.addEventListener('keydown', function(e) {
                if (e.key === 'Escape' && sidebar && sidebar.classList.contains('active')) {
                    sidebar.classList.remove('active');
                }
            });
            
            // Handle window resize
            window.addEventListener('resize', function() {
                if (window.innerWidth > 768 && sidebar) {
                    sidebar.classList.remove('active');
                }
            });
            
            // ========== MODAL FUNCTIONALITY ==========
            if (addCategoryBtn && modal) {
                addCategoryBtn.addEventListener('click', function(e) {
                    e.preventDefault();
                    modal.style.display = 'flex';
                });
            }
            
            function closeModal() {
                if (modal) {
                    modal.style.display = 'none';
                }
            }
            
            if (closeModalBtn) {
                closeModalBtn.addEventListener('click', closeModal);
            }
            
            if (cancelBtn) {
                cancelBtn.addEventListener('click', closeModal);
            }
            
            // Click outside to close
            window.addEventListener('click', function(e) {
                if (e.target === modal) {
                    closeModal();
                }
            });
            
            // ========== ICON SELECTOR ==========
            iconOptions.forEach(icon => {
                icon.addEventListener('click', function() {
                    iconOptions.forEach(i => i.classList.remove('selected'));
                    this.classList.add('selected');
                    if (selectedIconInput) {
                        selectedIconInput.value = this.getAttribute('data-icon') || 'code';
                    }
                });
            });
            
            // ========== FORM SUBMISSION ==========
            if (categoryForm) {
                categoryForm.addEventListener('submit', function(e) {
                    e.preventDefault();
                    alert('Category created successfully!');
                    closeModal();
                    this.reset();
                });
            }
            
            // ========== LOGOUT ==========
         
            
            // ========== NOTIFICATION ==========
            if (notificationBtn) {
                notificationBtn.addEventListener('click', function() {
                    alert('Notifications:\n1. New student registration\n2. Quiz submission pending review\n3. System update available');
                });
            }
            
            // ========== STATS ANIMATION (Optional) ==========
            // This adds a subtle animation to the stats cards
            const statValues = document.querySelectorAll('.stat-value');
            statValues.forEach(stat => {
                const originalValue = stat.textContent;
                stat.setAttribute('data-original', originalValue);
            });
        });