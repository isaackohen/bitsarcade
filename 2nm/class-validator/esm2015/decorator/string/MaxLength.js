import { buildMessage, ValidateBy } from "../common/ValidateBy";
import validator from "validator";
export const MAX_LENGTH = "maxLength";
/**
 * Checks if the string's length is not more than given number. Note: this function takes into account surrogate pairs.
 * If given value is not a string, then it returns false.
 */
export function maxLength(value, max) {
    return typeof value === "string" && validator.isLength(value, { min: 0, max });
}
/**
 * Checks if the string's length is not more than given number. Note: this function takes into account surrogate pairs.
 * If given value is not a string, then it returns false.
 */
export function MaxLength(max, validationOptions) {
    return ValidateBy({
        name: MAX_LENGTH,
        constraints: [max],
        validator: {
            validate: (value, args) => maxLength(value, args.constraints[0]),
            defaultMessage: buildMessage((eachPrefix) => eachPrefix + "$property must be shorter than or equal to $constraint1 characters", validationOptions)
        }
    }, validationOptions);
}

//# sourceMappingURL=MaxLength.js.map
