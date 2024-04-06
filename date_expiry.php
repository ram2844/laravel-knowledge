<!-- expiry date -->

{
    field: "expiry",
    title: "Expiry",
    template: t => {
        const today = new Date();
        const expiryDate = new Date(t?.expiry);
        const diffDays = Math.ceil((expiryDate - today) / (24 * 60 * 60 * 1000));
        const colorClass = diffDays >= 0 && diffDays <= 30 ? 'label-light-warning' : (diffDays < 0 ? 'label-light-danger' : 'label-light-success');
        return `<span class="label font-weight-bold label-lg ${colorClass} label-inline">${t?.expiry}</span>`;
    },
},
