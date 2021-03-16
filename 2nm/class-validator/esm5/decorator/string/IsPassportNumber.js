import { buildMessage, ValidateBy } from "../common/ValidateBy";
import validator from "validator";
export var IS_PASSPORT_NUMBER = "isPassportNumber";
/**
 * Check if the string is a valid passport number relative to a specific country code.
 * If given value is not a string, then it returns false.
 */
export function isPassportNumber(value, countryCode) {
    return typeof value === "string" && validator.isPassportNumber(value, countryCode);
}
/**
 * Check if the string is a valid passport number relative to a specific country code.
 * If given value is not a string, then it returns false.
 */
export function IsPassportNumber(countryCode, validationOptions) {
    return ValidateBy({
        name: IS_PASSPORT_NUMBER,
        constraints: [countryCode],
        validator: {
            validate: function (value, args) { return isPassportNumber(value, args.constraints[0]); },
            defaultMessage: buildMessage(function (eachPrefix) { return eachPrefix + "$property must be valid passport number"; }, validationOptions)
        }
    }, validationOptions);
}

//# sourceMappingURL=IsPassportNumber.js.map
