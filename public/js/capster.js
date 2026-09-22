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
  if (profileHeader) {
    profileHeader.addEventListener('click', (e) => {
      // Open modal if they click anywhere on header (except toggle)
      if (!e.target.closest('#dutyToggleBtn')) {
        openModal('modalEditProfile');
      }
    });
  }
  
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
  if (btnRequestLeave) {
    btnRequestLeave.addEventListener('click', () => {
      openModal('modalLeaveRequest');
    });
  }

  // Client-side Leave Date Validation sync
  const leaveStartDate = document.getElementById('leaveStartDate');
  const leaveEndDate = document.getElementById('leaveEndDate');
  if (leaveStartDate && leaveEndDate) {
    leaveStartDate.addEventListener('change', () => {
      if (leaveStartDate.value) {
        leaveEndDate.min = leaveStartDate.value;
        if (leaveEndDate.value && leaveEndDate.value < leaveStartDate.value) {
          leaveEndDate.value = leaveStartDate.value;
        }
      }
    });
  }
});

// Modal Utilities
function openModal(modalId) {
  const modal = document.getElementById(modalId);
  if (modal) {
    modal.classList.remove('opacity-0', 'pointer-events-none');
    modal.classList.add('active', 'opacity-100', 'pointer-events-auto');
  }
}

function closeModal(modalId) {
  const modal = document.getElementById(modalId);
  if (modal) {
    modal.classList.remove('active', 'opacity-100', 'pointer-events-auto');
    modal.classList.add('opacity-0', 'pointer-events-none');
  }
}

window.openModal = openModal;
window.closeModal = closeModal;

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
  if (drawer) {
    drawer.classList.remove('opacity-0', 'pointer-events-none');
    drawer.classList.add('active', 'opacity-100', 'pointer-events-auto');
    const panel = drawer.querySelector('.transform');
    if (panel) {
      panel.classList.remove('translate-y-full');
      panel.classList.add('translate-y-0');
    }
  }
}

function closeDrawer(drawerId) {
  const drawer = document.getElementById(drawerId);
  if (drawer) {
    const panel = drawer.querySelector('.transform');
    if (panel) {
      panel.classList.remove('translate-y-0');
      panel.classList.add('translate-y-full');
    }
    setTimeout(() => {
      drawer.classList.remove('active', 'opacity-100', 'pointer-events-auto');
      drawer.classList.add('opacity-0', 'pointer-events-none');
    }, 200);
  }
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
    span.className = 'skill-tag inline-flex items-center px-2.5 py-1 bg-gray-100 rounded-full text-xs font-semibold text-primary border border-gray-200';
    span.innerHTML = `${val} <button class="remove-tag ml-1 text-gray-500 hover:text-primary" onclick="removeTag(this)" aria-label="Remove tag">✕</button>`;
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

async function saveProfile() {
  const bioInput = document.getElementById('editBioInput');
  const bio = bioInput ? bioInput.value.trim() : '';

  const skills = Array.from(document.querySelectorAll('#skillTagsContainer .skill-tag'))
    .map(tag => tag.childNodes[0] ? tag.childNodes[0].textContent.trim() : '')
    .filter(skill => skill.length > 0);

  const csrfMeta = document.querySelector('meta[name="csrf-token"]');
  const csrfToken = csrfMeta ? csrfMeta.getAttribute('content') : '';

  try {
    const response = await fetch('/capster/profile', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
        'Accept': 'application/json',
        'X-CSRF-TOKEN': csrfToken
      },
      body: JSON.stringify({
        bio: bio,
        skills: skills
      })
    });

    const data = await response.json();

    if (response.ok && (data.status === 'success' || data.success)) {
      closeModal('modalEditProfile');
      window.location.reload();
    } else {
      const errorMsg = data.message || (data.errors ? Object.values(data.errors).flat().join('\n') : 'Gagal memperbarui profil.');
      alert(errorMsg);
    }
  } catch (err) {
    console.error('Error saving profile:', err);
    alert('Terjadi kesalahan saat menyimpan profil. Silakan coba lagi.');
  }
}

async function submitLeaveRequest() {
  const leaveStartDate = document.getElementById('leaveStartDate');
  const leaveEndDate = document.getElementById('leaveEndDate');
  const leaveCategory = document.getElementById('leaveCategory');
  const leaveReason = document.getElementById('leaveReason');
  const btnSubmit = document.getElementById('btnSubmitLeaveRequest');

  const startDateVal = leaveStartDate ? leaveStartDate.value.trim() : '';
  const endDateVal = leaveEndDate ? leaveEndDate.value.trim() : '';
  const categoryVal = leaveCategory ? leaveCategory.value.trim() : '';
  const reasonVal = leaveReason ? leaveReason.value.trim() : '';

  if (!startDateVal || !endDateVal || !categoryVal) {
    alert('Harap lengkapi tanggal mulai, tanggal selesai, dan kategori izin terlebih dahulu.');
    return;
  }

  if (endDateVal < startDateVal) {
    alert('Tanggal selesai tidak boleh sebelum tanggal mulai.');
    return;
  }

  const csrfMeta = document.querySelector('meta[name="csrf-token"]');
  const csrfToken = csrfMeta ? csrfMeta.getAttribute('content') : '';

  if (btnSubmit) btnSubmit.disabled = true;

  try {
    const response = await fetch('/capster/leave-request', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
        'Accept': 'application/json',
        'X-CSRF-TOKEN': csrfToken
      },
      body: JSON.stringify({
        start_date: startDateVal,
        end_date: endDateVal,
        category: categoryVal,
        reason: reasonVal
      })
    });

    const data = await response.json();

    if (response.ok && (data.status === 'success' || data.success)) {
      alert('Pengajuan cuti berhasil dikirim, menunggu persetujuan admin');
      if (leaveStartDate) leaveStartDate.value = '';
      if (leaveEndDate) leaveEndDate.value = '';
      if (leaveCategory) leaveCategory.value = '';
      if (leaveReason) leaveReason.value = '';
      closeModal('modalLeaveRequest');
    } else {
      const errorMsg = data.message || (data.errors ? Object.values(data.errors).flat().join('\n') : 'Gagal mengirim pengajuan cuti.');
      alert(errorMsg);
    }
  } catch (err) {
    console.error('Error submitting leave request:', err);
    alert('Terjadi kesalahan saat mengirim pengajuan cuti. Silakan coba lagi.');
  } finally {
    if (btnSubmit) btnSubmit.disabled = false;
  }
}

// Global window bindings for inline HTML onclick handlers
window.openModal = openModal;
window.closeModal = closeModal;
window.openAppointmentDrawer = openAppointmentDrawer;
window.closeDrawer = closeDrawer;
window.addSkill = addSkill;
window.removeTag = removeTag;
window.saveProfile = saveProfile;
window.submitLeaveRequest = submitLeaveRequest;


