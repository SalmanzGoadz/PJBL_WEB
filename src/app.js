document.addEventListener('alpine:init', () => {
    Alpine.data('products', () => ({
        items: [
            { id: 1, name: 'Espresso', img: 'Espresso.jpg', price: 20000},
            { id: 2, name: 'Americano', img: 'Americano.jpg', price: 25000},
            { id: 3, name: 'Latte', img: 'Latte.jpg', price: 30000},
            { id: 4, name: 'Milo Pejabat ', img: 'milopejabat.jpg', price: 35000},
            { id: 5, name: 'Singkong', img: 'sing.jpg', price: 99999999}
        ]
    }))

    Alpine.store('cart', {
        items: [],
        total: 0,
        quantity: 0,
        add(newItem) {
            // cek apakah ada barang yang sama di cart
            const cartItem = this.items.find((item) => item.id === newItem.id)

            // jika belum ada atau cart masih kosong
            if(!cartItem) {
                this.items.push({...newItem, quantity: 1, total: newItem.price})
                this.quantity++
                this.total += newItem.price
            } else {
                // jika barang sudah ada, cek apakah barang beda attau sama dengan yang ada di cart
                this.items = this.items.map((item) => {
                    if (item.id !== newItem.id) {
                        return item
                    } else {
                        // jika barang sudah ada, tambah quantity dan totalnya
                        item.quantity++
                        item.total = item.price * item.quantity
                        this.quantity++
                        this.total += item.price
                        return item
                    }
                })
            }
        },
        remove(id) {
            //ambil item yang mau diremove berdasarkan id
            const cartItem = this.items.find((item) => item.id === id);
            
            // Jika item lebih dari 1
            if(cartItem.quantity > 1) {
                // telusuri 1 1
                this.items = this.items.map((item) => {
                    // Jika bukan barang yang di klik
                    if (item.id !== id) {
                        return item 
                    } else {
                        item.quantity--
                        item.total = item.price * item.quantity
                        this.quantity--
                        this.total -= item.price
                        return item
                    }
                })
            } else if (cartItem.quantity === 1) {
                this.items = this.items.filter((item) => item.id !== id)
                this.quantity--
                this.total -= cartItem.price
            }
        },
    })
})

// Konversi ke rupiah
const rupiah = (number) => {
    return new Intl.NumberFormat('id-ID', {
        style: 'currency',
        currency: 'IDR',
        minimumFractionDigits: 0
    }).format(number)
}