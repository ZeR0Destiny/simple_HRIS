function loadStores() {
    const regionSelect = document.getElementById('inputRegion');
    const storeSelect = document.getElementById('inputHomeStore');

    storeSelect.innerHTML = '<option selected value="">Select a home store</option>';

    const selectedRegion = regionSelect.value;

    let stores = [];

    // if (selectedRegion == 'CENTRAL') {
        
    // } else if (selectedRegion == 'EAST') {
        
    // }

    switch (selectedRegion) {
        case 'CENTRAL':
            stores = [
                'HCM'
            ];
            break;
    
        default:
            break;
    }

    stores.forEach(store => {
        const option = document.createElement('option');
        option.value = store;
        option.textContent = store;
        storeSelect.appendChild(option);
    });
}