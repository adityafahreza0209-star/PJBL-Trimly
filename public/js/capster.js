document.addEventListener('DOMContentLoaded', () => {
  // Duty Toggle Logic
  const dutyToggleBtn = document.getElementById('dutyToggleBtn');
  const statusDot = document.getElementById('statusDot');
  const statusLabel = document.getElementById('statusLabel');
  
  if (dutyToggleBtn) {
    let isOnDuty = true;
    dutyToggleBtn.addEventListener('click', (e) => {
      e.stopPropagation();
      isOnDuty = !isOnDuty;
      const knob = dutyToggleBtn.querySelector('span');
      
      if (isOnDuty) {
        dutyToggleBtn.classList.remove('bg-slate-300');
        dutyToggleBtn.classList.add('bg-primary');
        if (statusDot) statusDot.className = 'w-2.5 h-2.5 rounded-full bg-primary';
        if (statusLabel) statusLabel.textContent = 'On Duty';
        if (knob) knob.className = 'inline-block h-4 w-4 transform rounded-full bg-white transition translate-x-6';
      } else {
        dutyToggleBtn.classList.remove('bg-primary');
        dutyToggleBtn.classList.add('bg-slate-300');
        if (statusDot) statusDot.className = 'w-2.5 h-2.5 rounded-full bg-slate-300';
        if (statusLabel) statusLabel.textContent = 'Off Duty';
        if (knob) knob.className = 'inline-block h-4 w-4 transform rounded-full bg-white transition translate-x-1';
      }
    });
  }

  // Profile Header Edit Profile Modal Trigger
  const profileHeader = document.getElementById('profileHeader');
  profileHeader.addEventListener('click', (e) => {
    // Open modal if they click anywhere on header (except toggle)
    if (!e.target.closest('#dutyToggleBtn')) {
      openModal('modalEditProfile');
    }
  });
  
  // Specific Pencil Button trigger
  const btnEditProfileIcon = document.getElementById('btnEditProfileIcon');
  if (btnEditProfileIcon) {
    btnEditProfileIcon.addEventListener('click', (e) => {
      e.stopPropagation();
      openModal('modalEditProfile');
    });
  }

  // Leave Request FAB Trigger
  const btnRequestLeave = document.getElementById('btnRequestLeave');
  btnRequestLeave.addEventListener('click', () => {
    openModal('modalLeaveRequest');
  });
});

// Modal Utilities
function openModal(modalId) {
  const modal = document.getElementById(modalId);
  if (modal) modal.classList.add('active');
}

function closeModal(modalId) {
  const modal = document.getElementById(modalId);
  if (modal) modal.classList.remove('active');
}

// Drawer & Roster Logic
let currentCard = null;

function openAppointmentDrawer(clientName, time, service, status, el) {
  currentCard = el;
  
  // Populate Drawer Data
  const drawerClientName = document.getElementById('drawerClientName');
  const drawerClientTime = document.getElementById('drawerClientTime');
  const statusBadge = document.getElementById('drawerClientStatus');

  if (drawerClientName) drawerClientName.textContent = clientName;
  if (drawerClientTime) drawerClientTime.textContent = `${time} • ${service}`;
  
  if (statusBadge) {
    statusBadge.textContent = status;
    if (status === 'DP Paid') {
      statusBadge.className = 'status-badge inline-flex items-center px-2.5 py-0.5 rounded-full text-xs bg-accent/10 text-accent font-bold border border-accent/20';
    } else if (status === 'In Chair') {
      statusBadge.className = 'status-badge inline-flex items-center px-2.5 py-0.5 rounded-full text-xs bg-primary/10 text-primary font-bold border border-primary/20';
    } else if (status === 'Done') {
      statusBadge.className = 'status-badge inline-flex items-center px-2.5 py-0.5 rounded-full text-xs bg-slate-100 text-slate-500 font-medium';
    } else {
      statusBadge.className = 'status-badge inline-flex items-center px-2.5 py-0.5 rounded-full text-xs bg-slate-100 text-slate-600 font-medium';
    }
  }
  
  const btnStartService = document.getElementById('btnStartService');
  if (btnStartService) {
    if (status === 'Done') {
      btnStartService.style.display = 'none';
    } else if (status === 'In Chair') {
      btnStartService.style.display = 'block';
      btnStartService.textContent = 'Tandai Selesai / Completed';
      btnStartService.onclick = () => markCompleted();
    } else {
      btnStartService.style.display = 'block';
      btnStartService.textContent = 'Mulai Layanan / In-Chair';
      btnStartService.onclick = () => markInChair();
    }
  }

  const drawer = document.getElementById('bottomDrawerAppointment');
  if (drawer) drawer.classList.add('active');
}

function closeDrawer(drawerId) {
  const drawer = document.getElementById(drawerId);
  if (drawer) drawer.classList.remove('active');
}

function markInChair() {
  if (currentCard) {
    const badge = currentCard.querySelector('.status-badge, .badge, [class*="rounded-full"]');
    if (badge) {
      badge.textContent = 'In Chair';
      badge.className = 'status-badge inline-flex items-center px-2.5 py-0.5 rounded-full text-xs bg-primary/10 text-primary font-bold border border-primary/20';
    }
    
    const onClickStr = currentCard.getAttribute('onclick');
    if (onClickStr) {
      currentCard.setAttribute('onclick', onClickStr.replace("'DP Paid'", "'In Chair'"));
    }
  }
  closeDrawer('bottomDrawerAppointment');
}

function markCompleted() {
  if (currentCard) {
    const badge = currentCard.querySelector('.status-badge, .badge, [class*="rounded-full"]');
    if (badge) {
      badge.textContent = 'Done';
      badge.className = 'status-badge inline-flex items-center px-2.5 py-0.5 rounded-full text-xs bg-slate-100 text-slate-500 font-medium';
    }
    
    currentCard.classList.add('opacity-75');
    
    const onClickStr = currentCard.getAttribute('onclick');
    if (onClickStr) {
      currentCard.setAttribute('onclick', onClickStr.replace("'In Chair'", "'Done'"));
    }
  }
  closeDrawer('bottomDrawerAppointment');
}

// Profile Skill Tags Management
function addSkill() {
  const input = document.getElementById('newSkillInput');
  const val = input.value.trim();
  if (val) {
    const container = document.getElementById('skillTagsContainer');
    const span = document.createElement('span');
    span.className = 'skill-tag';
    span.innerHTML = `${val} <button class="remove-tag" onclick="removeTag(this)" aria-label="Remove tag">✕</button>`;
    container.appendChild(span);
    input.value = '';
  }
}

document.getElementById('newSkillInput')?.addEventListener('keypress', function(e) {
  if (e.key === 'Enter') {
    e.preventDefault();
    addSkill();
  }
});

function removeTag(btn) {
  btn.parentElement.remove();
}

function saveProfile() {
  // Simulate saving bio & skills
  console.log('Profile saved');
  closeModal('modalEditProfile');
}
