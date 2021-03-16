import { buildMessage, ValidateBy } from "../common/ValidateBy";
import validator from "validator";
export const IS_HEXADECIMAL = "isHexadecimal";
/**
 * Checks if the string is a hexadecimal number.
 * If given value is not a string, then it returns false.
 */
export function isHexadecimal(value) {
    return typeof value === "string" && validator.isHexadecimal(value);
}
/**
 * Checks if the string is a hexadecimal number.
 * If given value is not a string, then it returns false.
 */
export function IsHexadecimal(validationOptions) {
    return ValidateBy({
        name: IS_HEXADECIMAL,
        validator: {
            validate: (value, args) => isHexadecimal(value),
            defaultMessage: buildMessage((eachPrefix) => eachPrefix + "$property must be a hexadecimal number", validationOptions)
        }
    }, validationOptions);
}

//# sourceMappingURL=IsHexadecimal.js.map
