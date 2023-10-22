"use strict";
(self["webpackChunkseven_tech_location"] = self["webpackChunkseven_tech_location"] || []).push([["src_views_Location_jsx"],{

/***/ "./src/views/Location.jsx":
/*!********************************!*\
  !*** ./src/views/Location.jsx ***!
  \********************************/
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

__webpack_require__.r(__webpack_exports__);
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! react */ "react");
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(react__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _react_google_maps_api__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @react-google-maps/api */ "./node_modules/@react-google-maps/api/dist/esm.js");
/* harmony import */ var use_places_autocomplete__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! use-places-autocomplete */ "./node_modules/use-places-autocomplete/dist/index.esm.js");
/* harmony import */ var _reach_combobox__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! @reach/combobox */ "./node_modules/@reach/combobox/dist/reach-combobox.esm.js");





function Location() {
  const {
    isLoaded
  } = (0,_react_google_maps_api__WEBPACK_IMPORTED_MODULE_2__.useLoadScript)({
    googleMapsApiKey: process.env.NEXT_PUBLIC_GOOGLE_MAPS_API_KEY,
    libraries: ['places']
  });
  if (!isLoaded) return (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", null, "Loading...");
  return (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(Map, null);
}
function Map() {
  const center = (0,react__WEBPACK_IMPORTED_MODULE_0__.useMemo)(() => ({
    lat: 43.45,
    lng: -80.49
  }), []);
  const [selected, setSelected] = (0,react__WEBPACK_IMPORTED_MODULE_0__.useState)(null);
  return (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(react__WEBPACK_IMPORTED_MODULE_0__.Fragment, null, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
    className: "places-container"
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(PlacesAutocomplete, {
    setSelected: setSelected
  })), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_react_google_maps_api__WEBPACK_IMPORTED_MODULE_2__.GoogleMap, {
    zoom: 10,
    center: center,
    mapContainerClassName: "map-container"
  }, selected && (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_react_google_maps_api__WEBPACK_IMPORTED_MODULE_2__.Marker, {
    position: selected
  })));
}
const PlacesAutocomplete = ({
  setSelected
}) => {
  const {
    ready,
    value,
    setValue,
    suggestions: {
      status,
      data
    },
    clearSuggestions
  } = (0,use_places_autocomplete__WEBPACK_IMPORTED_MODULE_1__["default"])();
  const handleSelect = async address => {
    setValue(address, false);
    clearSuggestions();
    const results = await (0,use_places_autocomplete__WEBPACK_IMPORTED_MODULE_1__.getGeocode)({
      address
    });
    const {
      lat,
      lng
    } = await (0,use_places_autocomplete__WEBPACK_IMPORTED_MODULE_1__.getLatLng)(results[0]);
    setSelected({
      lat,
      lng
    });
  };
  return (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_reach_combobox__WEBPACK_IMPORTED_MODULE_3__.Combobox, {
    onSelect: handleSelect
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_reach_combobox__WEBPACK_IMPORTED_MODULE_3__.ComboboxInput, {
    value: value,
    onChange: e => setValue(e.target.value),
    disabled: !ready,
    className: "combobox-input",
    placeholder: "Search an address"
  }), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_reach_combobox__WEBPACK_IMPORTED_MODULE_3__.ComboboxPopover, null, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_reach_combobox__WEBPACK_IMPORTED_MODULE_3__.ComboboxList, null, status === 'OK' && data.map(({
    place_id,
    description
  }) => (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_reach_combobox__WEBPACK_IMPORTED_MODULE_3__.ComboboxOption, {
    key: place_id,
    value: description
  })))));
};
/* harmony default export */ __webpack_exports__["default"] = (Location);

/***/ })

}]);
//# sourceMappingURL=src_views_Location_jsx.js.map