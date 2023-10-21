import { configureStore } from '@reduxjs/toolkit';

import { locationSlice } from '../controllers/locationSlice';

const store = configureStore({
    reducer: {
        location: locationSlice.reducer,
    }
});

export default store;