// Access the radio buttons
const englishRadio1 = document.getElementById('english1');
const japanRadio1 = document.getElementById('japan1');
const englishRadio = document.getElementById('english');
const japanRadio = document.getElementById('japan');

// Add event listeners for change events
englishRadio1.addEventListener('change', (event) => {
  if (event.target.checked) {
    console.log('English selected');
    setLanguage('english');
    englishAction();
  }
});

japanRadio1.addEventListener('change', (event) => {
  if (event.target.checked) {
    setLanguage('japan');
    japanAction();
  }
});

englishRadio.addEventListener('change', (event) => {
  if (event.target.checked) {
    console.log('English selected');
    setLanguage('english');
    englishAction();
  }
});

japanRadio.addEventListener('change', (event) => {
  if (event.target.checked) {
    setLanguage('japan');
    japanAction();
  }
});

// Define the actions
function englishAction() {
  document.getElementById('ltrSidebar').style.display = 'block';
  document.getElementById('ltrMain').style.display = 'block';
  document.getElementById('rtlSidebar').style.display = 'none';
  document.getElementById('rtlMain').style.display = 'none';
  englishRadio1.checked = true;
  // Add your English-specific logic here
}

function japanAction() {
  document.getElementById('ltrSidebar').style.display = 'none';
  document.getElementById('ltrMain').style.display = 'none';
  document.getElementById('rtlSidebar').style.display = 'block';
  document.getElementById('rtlMain').style.display = 'block';
  japanRadio.checked = true;
  // Add your Japan-specific logic here
}

// Helper function to set language in local storage
function setLanguage(language) {
  localStorage.setItem('selectedLanguage', language);
}

// Helper function to get language from local storage
function getLanguage() {
  return localStorage.getItem('selectedLanguage');
}

// Set the layout based on the stored language on page load
window.addEventListener('load', () => {
  const savedLanguage = getLanguage();

  if (savedLanguage === 'english') {
    englishRadio1.checked = true; // Set the radio button
    englishAction(); // Trigger English layout
  } else if (savedLanguage === 'japan') {
    japanRadio.checked = true;
    japanAction(); // Trigger Japan layout
  } else {
    // Default to English if no language is saved
    setLanguage('english');
    englishRadio1.checked = true;
    englishAction();
  }
});
