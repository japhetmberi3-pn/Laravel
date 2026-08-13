// Gestion du menu mobile
const openNavBtn = document.getElementById('openNav');
const closeNavBtn = document.getElementById('closeNav');
const mobileNav = document.getElementById('mobileNav');

if (openNavBtn) {
  openNavBtn.addEventListener('click', () => {
    mobileNav.classList.remove('hidden');
  });
}

if (closeNavBtn) {
  closeNavBtn.addEventListener('click', () => {
    mobileNav.classList.add('hidden');
  });
}

// Gestion de la modale d'inscription
const openRegisterBtn = document.getElementById('openRegister');
const closeRegisterBtn = document.getElementById('closeRegister');
const registerModal = document.getElementById('registerModal');

if (openRegisterBtn) {
  openRegisterBtn.addEventListener('click', () => {
    registerModal.classList.remove('hidden');
  });
}

if (closeRegisterBtn) {
  closeRegisterBtn.addEventListener('click', () => {
    registerModal.classList.add('hidden');
  });
}

// Gestion de la modale de connexion
const openLoginBtn = document.getElementById('openLogin');
const closeLoginBtn = document.getElementById('closeLogin');
const loginModal = document.getElementById('loginModal');

if (openLoginBtn) {
  openLoginBtn.addEventListener('click', () => {
    loginModal.classList.remove('hidden');
  });
}

if (closeLoginBtn) {
  closeLoginBtn.addEventListener('click', () => {
    loginModal.classList.add('hidden');
  });
}

// Fermer les modales en cliquant en dehors
registerModal?.addEventListener('click', (e) => {
  if (e.target === registerModal) {
    registerModal.classList.add('hidden');
  }
});

loginModal?.addEventListener('click', (e) => {
  if (e.target === loginModal) {
    loginModal.classList.add('hidden');
  }
});

// Fermer le menu mobile en cliquant en dehors
mobileNav?.addEventListener('click', (e) => {
  if (e.target === mobileNav) {
    mobileNav.classList.add('hidden');
  }
});