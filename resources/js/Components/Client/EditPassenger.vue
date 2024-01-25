<script setup>
import { reactive, defineEmits } from 'vue';
import axios from 'axios';

// Define emits for closing the modal and emitting events on form submission
const emits = defineEmits(['close-modal', 'update-passenger']);

// Reactive object to hold passenger data
const passenger = reactive({
    first_name: '',
    middle_name: '',
    last_name: '',
    date_of_birth: '',
    nationality: '',
    gender: 'male', // Default gender
});

// Function to submit the form
const submit = () => {
    axios.post('/api/passengers', passenger)
        .then(response => {
            console.log('Passenger saved:', response.data);
            emits('update-passenger', response.data);
            closeModal(); // Close the modal after submission
        })
        .catch(error => {
            console.error('Error saving passenger:', error);
        });
};

// Function to close the modal
const closeModal = () => {
    emits('close-modal');
};
</script>
